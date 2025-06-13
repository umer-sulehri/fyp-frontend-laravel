<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Wav;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class VideoToTextController extends Controller
{
    public function index()
    {
        return view('video-to-text');
    }

    public function convert(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimetypes:video/*,audio/*|max:25000', // 25MB max
            'conversion_type' => 'required|in:video_to_audio,audio_to_text,video_to_text',
            'summarize' => 'sometimes|boolean'
        ]);

        try {
            $file = $request->file('file');
            $conversionType = $request->input('conversion_type');
            $summarize = $request->boolean('summarize', false);

            Log::info("Starting conversion", [
                'type' => $conversionType,
                'filename' => $file->getClientOriginalName(),
                'size' => $file->getSize()
            ]);

            $result = [];

            if ($conversionType === 'video_to_audio') {
                $audioPath = $this->videoToAudio($file);
                return response()->download($audioPath)->deleteFileAfterSend();
            } 
            elseif ($conversionType === 'audio_to_text') {
                $result['text'] = $this->audioToText($file);
            } 
            elseif ($conversionType === 'video_to_text') {
                $result['text'] = $this->videoToText($file);
            }

            if ($summarize && isset($result['text'])) {
                $result['summary'] = $this->summarizeText($result['text']);
            }

            Log::info("Conversion successful", [
                'type' => $conversionType,
                'text_length' => isset($result['text']) ? strlen($result['text']) : 0
            ]);

            return response()->json($result);

        } catch (\Exception $e) {
            Log::error("Conversion failed", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'error' => $e->getMessage(),
                'details' => config('app.debug') ? $e->getTraceAsString() : null
            ], 500);
        }
    }

    protected function videoToAudio($videoFile)
    {
        try {
            // Configure FFmpeg with Windows paths
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries'  => 'C:\ffmpeg\bin\ffmpeg.exe',
                'ffprobe.binaries' => 'C:\ffmpeg\bin\ffprobe.exe',
                'timeout'          => 3600,
                'ffmpeg.threads'   => 12,
            ]);

            // Store the file with Windows-compatible path
            $tempVideoPath = str_replace('/', '\\', $videoFile->store('temp'));
            $tempVideoPath = storage_path('app\\'.$tempVideoPath);

            // Ensure output directory exists
            $outputDir = storage_path('app\\temp');
            if (!file_exists($outputDir)) {
                mkdir($outputDir, 0777, true);
            }

            $audioPath = storage_path('app\\temp\\output.wav');

            Log::info("Extracting audio", [
                'input_path' => $tempVideoPath,
                'output_path' => $audioPath
            ]);

            $video = $ffmpeg->open($tempVideoPath);
            $video->save(new Wav(), $audioPath);

            // Clean up video file
            unlink($tempVideoPath);

            return $audioPath;

        } catch (\Exception $e) {
            Log::error("Audio extraction failed", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new \Exception("Failed to extract audio: " . $e->getMessage());
        }
    }

    protected function audioToText($audioFile)
    {
        $maxRetries = 3;
        $retryDelay = 5; // seconds
        
        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            try {
                Log::info("Starting audio transcription attempt {$attempt}");

                // Preprocess audio first
                $processedPath = $this->preprocessAudio($audioFile);
                $fileResource = fopen($processedPath, 'r');

                $response = OpenAI::audio()->transcribe([
                    'model' => 'whisper-1',
                    'file' => $fileResource,
                    'response_format' => 'json',
                ], [
                    'timeout' => 120, // 120 seconds timeout
                ]);

                fclose($fileResource);
                unlink($processedPath); // Clean up

                Log::info("Transcription completed", [
                    'text_length' => strlen($response->text)
                ]);

                return $response->text;

            } catch (\Exception $e) {
                if (isset($processedPath) && file_exists($processedPath)) {
                    unlink($processedPath);
                }

                if ($attempt === $maxRetries) {
                    Log::error("Transcription failed after {$maxRetries} attempts", [
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    throw new \Exception("Failed to transcribe audio: " . $e->getMessage());
                }

                sleep($retryDelay * $attempt);
            }
        }
    }

    protected function preprocessAudio($audioFile)
    {
        $inputPath = is_string($audioFile) ? $audioFile : $audioFile->getRealPath();
        $outputPath = storage_path('app/processed_'.md5(time()).'.wav');
        
        // Convert to mono, reduce sample rate, and optimize for Whisper
        $command = '"C:\ffmpeg\bin\ffmpeg" -i "'.$inputPath.'" -ac 1 -ar 16000 -acodec pcm_s16le "'.$outputPath.'" 2>&1';
        
        exec($command, $output, $returnCode);
        
        if ($returnCode !== 0 || !file_exists($outputPath)) {
            throw new \Exception("Audio preprocessing failed: ".implode("\n", $output));
        }
        
        return $outputPath;
    }

    protected function videoToText($videoFile)
    {
        try {
            Log::info("Starting video to text conversion");

            $audioPath = $this->videoToAudio($videoFile);
            $text = $this->audioToText($audioPath);
            
            // Clean up audio file
            unlink($audioPath);

            return $text;

        } catch (\Exception $e) {
            Log::error("Video to text conversion failed", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new \Exception("Failed to convert video to text: " . $e->getMessage());
        }
    }

    protected function summarizeText($text)
    {
        $maxRetries = 2;
        $retryDelay = 3; // seconds
        
        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            try {
                Log::info("Generating summary attempt {$attempt}", [
                    'input_length' => strlen($text)
                ]);

                $response = OpenAI::chat()->create([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'Please provide a concise summary of the following text:'],
                        ['role' => 'user', 'content' => $text]
                    ],
                    'max_tokens' => 150,
                    'temperature' => 0.7,
                ], [
                    'timeout' => 60 // 60 seconds timeout
                ]);
                
                $summary = $response->choices[0]->message->content;

                Log::info("Summary generated", [
                    'summary_length' => strlen($summary)
                ]);

                return $summary;

            } catch (\Exception $e) {
                if ($attempt === $maxRetries) {
                    Log::error("Summarization failed after {$maxRetries} attempts", [
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    throw new \Exception("Failed to generate summary: " . $e->getMessage());
                }

                sleep($retryDelay * $attempt);
            }
        }
    }

    // Debugging endpoints
    public function testFfmpeg(Request $request)
    {
        try {
            $file = $request->file('file');
            $tempPath = str_replace('/', '\\', $file->store('temp'));
            $inputPath = storage_path('app\\'.$tempPath);
            
            $outputPath = storage_path('app\\temp\\test_output.wav');
            
            $command = '"C:\ffmpeg\bin\ffmpeg" -i "' . $inputPath . '" -vn -acodec pcm_s16le -ar 44100 -ac 2 "' . $outputPath . '" 2>&1';
            
            exec($command, $output, $returnCode);
            
            unlink($inputPath);
            
            if ($returnCode !== 0) {
                throw new \Exception("FFmpeg command failed: " . implode("\n", $output));
            }
            
            return response()->download($outputPath)->deleteFileAfterSend();
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'command' => $command ?? null,
                'output' => $output ?? null
            ], 500);
        }
    }

    public function testOpenAI()
    {
        try {
            $response = OpenAI::completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => 'Hello world',
                'max_tokens' => 10
            ], [
                'timeout' => 30 // 30 seconds timeout
            ]);
            
            return response()->json([
                'result' => $response->choices[0]->text,
                'model' => $response->model,
                'usage' => $response->usage
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'openai_config' => config('openai')
            ], 500);
        }
    }
}