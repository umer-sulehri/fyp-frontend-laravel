@extends('layouts.app')

@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Video to Text Converter</h1>
                <h6 class="text-center">Transform your videos into editable text with AI-powered transcription</h6>

                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-link-45deg" id="basic-addon1"></span>
                        <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Paste YouTube, Instagram or Facebook link" aria-label="Search">
                        <button type="submit" class="form-control">Convert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="converter-section section-padding" id="section_converter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="sidebar bg-white shadow-lg rounded p-4">
                    <div class="sidebar-header">
                        <h3 class="mb-4">Conversion Options</h3>
                    </div>
                    <ul class="conversion-options list-unstyled">
                        <li class="active" data-type="video_to_audio">
                            <i class="fas fa-video me-2"></i>
                            <span>Video to Audio</span>
                            <p class="option-description">Extract audio from video files</p>
                        </li>
                        <li data-type="audio_to_text">
                            <i class="fas fa-microphone me-2"></i>
                            <span>Audio to Text</span>
                            <p class="option-description">Convert audio to text transcription</p>
                        </li>
                        <li data-type="video_to_text">
                            <i class="fas fa-file-alt me-2"></i>
                            <span>Video to Text</span>
                            <p class="option-description">Extract text from video content</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="converter-box bg-white shadow-lg rounded p-5">
                    <div class="upload-area" id="dropZone">
                        <input type="file" id="fileInput" hidden>
                        <div class="upload-content text-center">
                            <i class="fas fa-cloud-upload-alt upload-icon mb-3" style="font-size: 3rem; color: var(--primary-color);"></i>
                            <h4 class="mb-3">Drag and drop your file here</h4>
                            <p class="mb-4">or</p>
                            <button class="custom-btn" onclick="document.getElementById('fileInput').click()">
                                <i class="fas fa-folder-open me-2"></i> Choose File
                            </button>
                            <p class="file-types mt-3" id="supportedFormats"></p>
                        </div>
                    </div>

                    <div class="file-info d-flex justify-content-between align-items-center p-3 bg-light rounded mt-4" id="fileInfo" style="display: none;">
                        <div>
                            <i class="fas fa-file me-2"></i> 
                            <span id="fileName"></span>
                        </div>
                        <button class="btn btn-sm btn-danger" onclick="removeFile()">
                            <i class="fas fa-times me-1"></i> Remove
                        </button>
                    </div>

                    <button class="custom-btn w-100 mt-4" id="convertBtn" disabled>
                        <i class="fas fa-magic me-2"></i> Convert Now
                    </button>

                    <div class="loading text-center mt-5" id="loading" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Processing your file...</p>
                    </div>

                    <div class="result-area mt-5" id="resultArea" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="mb-0">
                                <i class="fas fa-check-circle text-success me-2"></i> 
                                Conversion Results
                            </h3>
                            <button class="btn btn-sm btn-outline-secondary" id="downloadBtn" style="display: none;">
                                <i class="fas fa-download me-1"></i> Download
                            </button>
                        </div>

                        <div id="resultContent" class="mb-4"></div>
                        
                        <div id="audioPlayer" class="bg-light p-4 rounded mb-4" style="display: none;">
                            <h4 class="mb-3">
                                <i class="fas fa-music me-2"></i>
                                Audio Preview
                            </h4>
                            <audio controls id="audioPreview" class="w-100">
                                Your browser does not support the audio element.
                            </audio>
                        </div>

                        <div id="textControls" class="d-flex gap-2 mb-4" style="display: none;">
                            <button class="btn btn-primary" id="copyBtn">
                                <i class="fas fa-copy me-1"></i> Copy Text
                            </button>
                            <button class="btn btn-info text-white" id="summarizeBtn">
                                <i class="fas fa-compress-alt me-1"></i> Summarize
                            </button>
                        </div>

                        <div id="summaryArea" class="bg-light p-4 rounded" style="display: none;">
                            <h4 class="mb-3">
                                <i class="fas fa-file-contract me-2"></i>
                                Summary
                            </h4>
                            <div id="summaryContent" class="p-3 bg-white rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">Explore Features</h2>
                <p>Discover the powerful tools included in our Video-to-Text Converter App</p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Summary</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">Title Generator</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane" type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Keyword Extractor</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane" type="button" role="tab" aria-controls="music-tab-pane" aria-selected="false">Audio Extractor</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="false">Text to Audio</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <!-- Summary Tab -->
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Upload Data</h5>
                                                <p class="mb-0">Upload your video or paste a URL to get started</p>
                                            </div>
                                            <span class="badge bg-design rounded-pill ms-auto"><i class="bi-upload"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/colleagues-working-cozy-office-medium-shot.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">AI Processing</h5>
                                                <p class="mb-0">Our AI analyzes and transcribes your content</p>
                                            </div>
                                            <span class="badge bg-design rounded-pill ms-auto"><i class="bi-gear"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Remote_design_team_re_urdx.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Get Results</h5>
                                                <p class="mb-0">Download your transcript and other outputs</p>
                                            </div>
                                            <span class="badge bg-design rounded-pill ms-auto"><i class="bi-download"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Redesign_feedback_re_jvm0.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Title Generator Tab -->
                    <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel" aria-labelledby="marketing-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Upload Content</h5>
                                                <p class="mb-0">Provide your video or text content</p>
                                            </div>
                                            <span class="badge bg-advertising rounded-pill ms-auto"><i class="bi-file-earmark-text"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Group_video_re_btu7.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Generate Titles</h5>
                                                <p class="mb-0">AI suggests multiple engaging titles</p>
                                            </div>
                                            <span class="badge bg-advertising rounded-pill ms-auto"><i class="bi-lightbulb"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_online_ad_re_ol62.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Use Anywhere</h5>
                                                <p class="mb-0">Copy titles for your content needs</p>
                                            </div>
                                            <span class="badge bg-advertising rounded-pill ms-auto"><i class="bi-clipboard-check"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_viral_tweet_gndb.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Keyword Extractor Tab -->
                    <div class="tab-pane fade" id="finance-tab-pane" role="tabpanel" aria-labelledby="finance-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Key Phrases</h5>
                                                <p class="mb-0">Extract important terms from your content</p>
                                            </div>
                                            <span class="badge bg-finance rounded-pill ms-auto"><i class="bi-tags"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Finance_re_gnv2.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-block custom-block-overlay">
                                    <div class="d-flex flex-column h-100">
                                        <img src="{{ asset('assets/images/businesswoman-using-tablet-analysis-graph-company-finance-strategy-statistics-success-concept-planning-future-office-room.jpg') }}" class="custom-block-image img-fluid" alt="">
                                        <div class="custom-block-overlay-text d-flex">
                                            <div>
                                                <h5 class="text-white mb-2">SEO Optimization</h5>
                                                <p class="text-white">Use extracted keywords to improve your content's search visibility and ranking</p>
                                                <a href="topics-detail.html" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                            </div>
                                            <span class="badge bg-finance rounded-pill ms-auto"><i class="bi-graph-up"></i></span>
                                        </div>
                                        <div class="social-share d-flex">
                                            <p class="text-white me-4">Share:</p>
                                            <ul class="social-icon">
                                                <li class="social-icon-item">
                                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                                </li>
                                                <li class="social-icon-item">
                                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                                </li>
                                                <li class="social-icon-item">
                                                    <a href="#" class="social-icon-link bi-pinterest"></a>
                                                </li>
                                            </ul>
                                            <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                        </div>
                                        <div class="section-overlay"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Audio Extractor Tab -->
                    <div class="tab-pane fade" id="music-tab-pane" role="tabpanel" aria-labelledby="music-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Upload Video</h5>
                                                <p class="mb-0">Select any video file from your device</p>
                                            </div>
                                            <span class="badge bg-music rounded-pill ms-auto"><i class="bi-file-earmark-play"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Compose_music_re_wpiw.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Extract Audio</h5>
                                                <p class="mb-0">Separate audio track from video</p>
                                            </div>
                                            <span class="badge bg-music rounded-pill ms-auto"><i class="bi-music-note-beamed"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_happy_music_g6wc.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Download MP3</h5>
                                                <p class="mb-0">Save high-quality audio file</p>
                                            </div>
                                            <span class="badge bg-music rounded-pill ms-auto"><i class="bi-file-earmark-music"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Podcast_audience_re_4i5q.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text to Audio Tab -->
                    <div class="tab-pane fade" id="education-tab-pane" role="tabpanel" aria-labelledby="education-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-3">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Input Text</h5>
                                                <p class="mb-0">Paste or type your text content</p>
                                            </div>
                                            <span class="badge bg-education rounded-pill ms-auto"><i class="bi-input-cursor-text"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Educator_re_ju47.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Generate Speech</h5>
                                                <p class="mb-0">Convert text to natural sounding audio</p>
                                            </div>
                                            <span class="badge bg-education rounded-pill ms-auto"><i class="bi-volume-up"></i></span>
                                        </div>
                                        <img src="{{ asset('assets/images/topics/undraw_Graduation_re_gthn.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="timeline-section section-padding" id="section_3">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-white mb-4">How does it work?</h2>
            </div>
            <div class="col-lg-10 col-12 mx-auto">
                <div class="timeline-container">
                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                        <div class="list-progress">
                            <div class="inner"></div>
                        </div>
                        <li>
                            <h4 class="text-white mb-3">Upload Your Content</h4>
                            <p class="text-white">Choose any video/audio file from your device or paste a URL from YouTube, Facebook, or Instagram. Our system supports various formats.</p>
                            <div class="icon-holder">
                              <i class="bi-upload"></i>
                            </div>
                        </li>
                        <li>
                            <h4 class="text-white mb-3">AI Processing</h4>
                            <p class="text-white">Our advanced AI analyzes your content, transcribes speech to text, extracts audio, identifies key topics, and generates summaries.</p>
                            <div class="icon-holder">
                              <i class="bi-gear"></i>
                            </div>
                        </li>
                        <li>
                            <h4 class="text-white mb-3">Get Your Results</h4>
                            <p class="text-white">Download the transcript, audio file, summary, keywords, and suggested titles. All results are editable before downloading.</p>
                            <div class="icon-holder">
                              <i class="bi-download"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 text-center mt-5">
                <p class="text-white">
                    Want to learn more?
                    <a href="#" class="btn custom-btn custom-border-btn ms-3">Free Trial</a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="faq-section section-padding" id="section_4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <h2 class="mb-4">Frequently Asked Questions</h2>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-5 col-12">
                <img src="{{ asset('assets/images/faq_graphic.jpg') }}" class="img-fluid" alt="FAQs">
            </div>
            <div class="col-lg-6 col-12 m-auto">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What types of files are supported?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We support <strong>MP4, MOV, AVI, WMV</strong> for videos and <strong>MP3, WAV, M4A</strong> for audio. For URLs, we support <strong>YouTube, Facebook, Instagram, Vimeo</strong> and most video sharing platforms.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How accurate is the transcription?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Our AI achieves <strong>90-95% accuracy</strong> for clear audio. Accuracy may vary with background noise, accents, or technical terminology. All transcripts are editable before download.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Is there a file size limit?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Free accounts can process files up to <strong>500MB</strong>. Premium accounts get <strong>2GB file size limit</strong> and faster processing. There's no limit for URL-based content.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can I edit the generated content?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes! All generated content - transcripts, summaries, titles - are fully editable before download. You can make any changes needed to match your requirements.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-section section-padding section-bg" id="section_5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5">Get in touch</h2>
            </div>
            <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                <h4 class="mb-3">Head office</h4>
                <p>Lahore, Pakistan</p>
                <hr>
                <p class="d-flex align-items-center mb-1">
                    <span class="me-2">Phone</span>
                    <a href="tel:309-4785572" class="site-footer-link">
                        +92309-4785572
                    </a>
                </p>
                <p class="d-flex align-items-center">
                    <span class="me-2">Email</span>
                    <a href="mailto:info@converter.com" class="site-footer-link">
                        info@converter.com
                    </a>
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mx-auto">
                <h4 class="mb-3">Sub office</h4>
                <p>Arid institute of management science Lahore</p>
                <hr>
                <p class="d-flex align-items-center mb-1">
                    <span class="me-2">Phone</span>
                    <a href="tel:110-220-3400" class="site-footer-link">
                        110-220-3400
                    </a>
                </p>
                <p class="d-flex align-items-center">
                    <span class="me-2">Email</span>
                    <a href="mailto:info@converter.com" class="site-footer-link">
                        info@converter.com
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Conversion type switching
    const conversionBtns = document.querySelectorAll('.conversion-btn');
    const uploadTitle = document.getElementById('upload-title');
    const fileUpload = document.getElementById('fileUpload');
    
    conversionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            conversionBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const target = this.dataset.target;
            switch(target) {
                case 'video-to-text':
                    uploadTitle.textContent = 'Upload Video';
                    fileUpload.accept = 'video/*';
                    break;
                case 'video-to-audio':
                    uploadTitle.textContent = 'Upload Video';
                    fileUpload.accept = 'video/*';
                    break;
                case 'audio-to-text':
                    uploadTitle.textContent = 'Upload Audio';
                    fileUpload.accept = 'audio/*';
                    break;
            }
        });
    });
    
    // File upload handling
    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        const uploadPreview = document.querySelector('.upload-preview');
        const uploadImage = uploadPreview.querySelector('.upload-image');
        const uploadInstructions = uploadPreview.querySelector('.upload-instructions');
        const audioPlayerContainer = uploadPreview.querySelector('.audio-player-container');
        const processBtn = document.getElementById('processBtn');
        
        uploadInstructions.style.display = 'none';
        
        if (file.type.includes('video')) {
            // For video files
            const video = document.createElement('video');
            video.src = URL.createObjectURL(file);
            video.controls = true;
            video.classList.add('w-100');
            
            uploadImage.replaceWith(video);
            audioPlayerContainer.classList.add('d-none');
            
            // Extract duration
            video.addEventListener('loadedmetadata', function() {
                document.getElementById('durationText').textContent = 
                    formatDuration(video.duration);
            });
        } else if (file.type.includes('audio')) {
            // For audio files
            uploadImage.classList.add('d-none');
            audioPlayerContainer.classList.remove('d-none');
            
            const audioPlayer = document.getElementById('audioPlayer');
            audioPlayer.src = URL.createObjectURL(file);
            
            // Extract duration
            audioPlayer.addEventListener('loadedmetadata', function() {
                document.getElementById('durationText').textContent = 
                    formatDuration(audioPlayer.duration);
            });
        }
        
        // Show process button
        processBtn.classList.remove('d-none');
    });
    
    // Process button click
    document.getElementById('processBtn').addEventListener('click', function() {
        const progressBar = document.getElementById('uploadProgress');
        progressBar.classList.remove('d-none');
        
        // Simulate processing
        let progress = 0;
        const interval = setInterval(() => {
            progress += 10;
            progressBar.querySelector('.progress-bar').style.width = `${progress}%`;
            
            if (progress >= 100) {
                clearInterval(interval);
                document.getElementById('statusBadge').innerHTML = 
                    '<i class="bi-check-circle me-1"></i> Processed';
                
                // Simulate results
                simulateResults();
            }
        }, 300);
    });
    
    // Helper function to format duration
    function formatDuration(seconds) {
        const h = Math.floor(seconds / 3600);
        const m = Math.floor(seconds % 3600 / 60);
        const s = Math.floor(seconds % 60);
        return [h, m, s].map(v => v < 10 ? '0' + v : v).join(':');
    }
    
    // Simulate processing results
    function simulateResults() {
        // Sample transcript
        const transcript = `Hello everyone, welcome to today's meeting. 
We'll be discussing our quarterly results and upcoming projects. 
The Q2 numbers show a 15% increase in revenue compared to last quarter. 
Our main focus for Q3 will be the new product launch scheduled for August.`;

        document.getElementById('transcriptText').value = transcript;
        document.getElementById('wordCount').textContent = 
            `${transcript.split(/\s+/).length} words`;
        
        // Sample summary
        document.getElementById('summaryText').value = 
            `The meeting covered quarterly results showing 15% revenue growth and plans for a new product launch in August.`;
        
        // Sample title
        document.getElementById('contentTitle').value = 
            "Quarterly Review: 15% Revenue Growth and Product Launch Plans";
        
        // Sample alternative titles
        const altTitles = [
            "Q2 Results Meeting: Growth and Future Plans",
            "Team Update: Strong Quarter and Upcoming Launch",
            "Business Review: Revenue Up 15%, New Product Coming"
        ];
        
        const altTitlesContainer = document.querySelector('.alternative-titles');
        altTitlesContainer.innerHTML = '';
        altTitles.forEach(title => {
            const badge = document.createElement('span');
            badge.className = 'badge bg-secondary me-2 mb-2';
            badge.textContent = title;
            altTitlesContainer.appendChild(badge);
        });
        
        // Sample key topics
        const keyTopics = ["Revenue", "Growth", "Product Launch", "Q2 Results", "Planning"];
        const keyTopicsContainer = document.querySelector('.key-topics');
        keyTopicsContainer.innerHTML = '';
        keyTopics.forEach(topic => {
            const badge = document.createElement('span');
            badge.className = 'badge bg-info me-2 mb-2';
            badge.textContent = topic;
            keyTopicsContainer.appendChild(badge);
        });
        
        // Sample key insights
        const insights = [
            "Positive revenue growth trend continuing",
            "New product expected to drive Q3 performance",
            "Team alignment on strategic priorities"
        ];
        const insightsContainer = document.querySelector('.key-insights');
        insightsContainer.innerHTML = '';
        insights.forEach(insight => {
            const li = document.createElement('li');
            li.textContent = insight;
            insightsContainer.appendChild(li);
        });
    }
    
    // Copy buttons functionality
    document.getElementById('copyTranscriptText').addEventListener('click', function() {
        copyToClipboard('transcriptText');
    });
    
    document.getElementById('copySummaryText').addEventListener('click', function() {
        copyToClipboard('summaryText');
    });
    
    document.getElementById('copyTitle').addEventListener('click', function() {
        copyToClipboard('contentTitle');
    });
    
    document.getElementById('copyAll').addEventListener('click', function() {
        const transcript = document.getElementById('transcriptText').value;
        const summary = document.getElementById('summaryText').value;
        const title = document.getElementById('contentTitle').value;
        
        const allContent = `Title: ${title}\n\nSummary: ${summary}\n\nTranscript:\n${transcript}`;
        copyToClipboard(null, allContent);
    });
    
    function copyToClipboard(elementId, text = null) {
        const textToCopy = text || document.getElementById(elementId).value;
        navigator.clipboard.writeText(textToCopy).then(() => {
            // Show feedback
            const originalText = this ? this.innerHTML : '';
            if (this) this.innerHTML = '<i class="bi-check"></i> Copied!';
            setTimeout(() => {
                if (this) this.innerHTML = originalText;
            }, 2000);
        });
    }
    
    // Summarize button
    document.getElementById('summarizeBtn').addEventListener('click', function() {
        const transcript = document.getElementById('transcriptText').value;
        if (!transcript.trim()) return;
        
        // Simulate summarization
        document.getElementById('summaryText').value = 
            "Generating summary... (this would be the summarized version of the transcript)";
        
        // Switch to summary tab
        const summaryTab = new bootstrap.Tab(document.getElementById('summary-tab'));
        summaryTab.show();
    });
    
    // Generate titles button
    document.getElementById('generateTitles').addEventListener('click', function() {
        // Simulate title generation
        const altTitles = [
            "New Suggested Title 1",
            "New Suggested Title 2",
            "New Suggested Title 3"
        ];
        
        const altTitlesContainer = document.querySelector('.alternative-titles');
        altTitlesContainer.innerHTML = '';
        altTitles.forEach(title => {
            const badge = document.createElement('span');
            badge.className = 'badge bg-secondary me-2 mb-2';
            badge.textContent = title;
            altTitlesContainer.appendChild(badge);
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    const convertBtn = document.getElementById('convertBtn');
    const resultArea = document.getElementById('resultArea');
    const resultContent = document.getElementById('resultContent');
    const downloadBtn = document.getElementById('downloadBtn');
    const loading = document.getElementById('loading');
    const conversionOptions = document.querySelectorAll('.conversion-options li');
    const supportedFormats = document.getElementById('supportedFormats');
    const audioPlayer = document.getElementById('audioPlayer');
    const textControls = document.getElementById('textControls');
    const summaryArea = document.getElementById('summaryArea');
    const summarizeBtn = document.getElementById('summarizeBtn');
    const copyBtn = document.getElementById('copyBtn');
    
    // State variables
    let selectedFile = null;
    let currentConversionType = 'video_to_text';
    let conversionResult = null;

    // File format configurations
    const formatConfig = {
        video_to_audio: {
            formats: ['mp4', 'avi', 'mov', 'mkv', 'webm'],
            accept: 'video/*',
            description: 'MP4, AVI, MOV, MKV, WEBM'
        },
        audio_to_text: {
            formats: ['wav', 'mp3', 'ogg', 'm4a', 'flac'],
            accept: 'audio/*',
            description: 'WAV, MP3, OGG, M4A, FLAC'
        },
        video_to_text: {
            formats: ['mp4', 'avi', 'mov', 'mkv', 'webm'],
            accept: 'video/*',
            description: 'MP4, AVI, MOV, MKV, WEBM'
        }
    };

    // Initialize supported formats display
    function updateSupportedFormats() {
        const config = formatConfig[currentConversionType];
        supportedFormats.textContent = `Supported formats: ${config.description}`;
        fileInput.setAttribute('accept', config.accept);
    }

    // Set up conversion type selection
    function setupConversionOptions() {
        conversionOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Update active state
                conversionOptions.forEach(opt => opt.classList.remove('active'));
                option.classList.add('active');
                
                // Update current conversion type
                currentConversionType = option.dataset.type;
                updateSupportedFormats();
                
                // Reset file selection
                removeFile();
                
                // Update UI based on conversion type
                updateUIForConversionType();
            });
        });
    }

    // Update UI elements based on current conversion type
    function updateUIForConversionType() {
        // Hide all result sections that might be visible
        audioPlayer.style.display = 'none';
        textControls.style.display = 'none';
        summaryArea.style.display = 'none';
        
        // Update button text
        const buttonTexts = {
            'video_to_audio': 'Convert to Audio',
            'audio_to_text': 'Transcribe Audio',
            'video_to_text': 'Transcribe Video'
        };
        convertBtn.innerHTML = `<i class="fas fa-magic me-2"></i> ${buttonTexts[currentConversionType]}`;
    }

    // Handle file selection
    function setupFileHandling() {
        // Drag and drop handlers
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            handleDroppedFiles(e.dataTransfer.files);
        });

        // File input change handler
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleDroppedFiles(e.target.files);
            }
        });
    }

    // Handle files from either drag-drop or file input
    function handleDroppedFiles(files) {
        if (files.length === 0) return;
        
        const file = files[0];
        const fileExtension = file.name.split('.').pop().toLowerCase();
        
        // Validate file type
        if (!formatConfig[currentConversionType].formats.includes(fileExtension)) {
            showAlert(`Invalid file format. Please upload a ${formatConfig[currentConversionType].description} file.`, 'danger');
            return;
        }
        
        // Handle valid file
        selectedFile = file;
        fileName.textContent = file.name;
        fileInfo.style.display = 'flex';
        convertBtn.disabled = false;
    }

    // Remove selected file
    function removeFile() {
        selectedFile = null;
        fileInput.value = '';
        fileInfo.style.display = 'none';
        convertBtn.disabled = true;
        resultArea.style.display = 'none';
        conversionResult = null;
    }

    // Convert button handler
    function setupConvertButton() {
        convertBtn.addEventListener('click', async () => {
            if (!selectedFile) return;
            
            // Prepare the UI for conversion
            loading.style.display = 'flex';
            resultArea.style.display = 'none';
            downloadBtn.style.display = 'none';
            audioPlayer.style.display = 'none';
            textControls.style.display = 'none';
            summaryArea.style.display = 'none';
            
            try {
                const formData = new FormData();
                formData.append('file', selectedFile);
                formData.append('conversion_type', currentConversionType);
                
                const response = await fetch('/convert', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    // Handle successful response based on conversion type
                    if (currentConversionType === 'video_to_audio') {
                        // This case is handled by the download response
                        return;
                    } else {
                        displayTextResults(data);
                    }
                } else {
                    throw new Error(data.error || 'Conversion failed');
                }
                
            } catch (error) {
                showAlert(`Conversion failed: ${error.message}`, 'danger');
            } finally {
                loading.style.display = 'none';
            }
        });
    }

    // Display text conversion results
    function displayTextResults(result) {
        // Set up text display
        resultContent.innerHTML = `
            <div class="alert alert-success mb-4">
                <i class="fas fa-check-circle me-2"></i>
                Transcription successful! You can copy the text below or download it.
            </div>
            <div class="transcription-result bg-light p-3 rounded">
                <textarea class="form-control" rows="10" id="transcriptionText" readonly>${result.text}</textarea>
            </div>
        `;
        
        // Show text controls
        textControls.style.display = 'flex';
        
        // Set up copy button
        copyBtn.onclick = () => {
            const textarea = document.getElementById('transcriptionText');
            textarea.select();
            document.execCommand('copy');
            showAlert('Text copied to clipboard!', 'success');
        };
        
        // Set up summarize button
        if (summarizeBtn) {
            summarizeBtn.onclick = () => {
                summarizeText(result.text);
            };
        }
        
        // Set up download button
        downloadBtn.onclick = () => {
            const blob = new Blob([result.text], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = selectedFile.name.replace(/\.[^/.]+$/, '') + '.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        };
        downloadBtn.style.display = 'inline-block';
        
        // Show result area
        resultArea.style.display = 'block';
        
        // Show summary if it exists
        if (result.summary) {
            displaySummary(result.summary);
        }
    }

    // Summarize text via API
    async function summarizeText(text) {
        try {
            summaryArea.style.display = 'block';
            document.getElementById('summaryContent').innerHTML = `
                <div class="text-center py-3">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2">Generating summary...</p>
                </div>
            `;
            
            const response = await fetch('/convert', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    text: text,
                    summarize: true
                })
            });
            
            const data = await response.json();
            
            if (response.ok) {
                displaySummary(data.summary);
            } else {
                throw new Error(data.error || 'Summarization failed');
            }
        } catch (error) {
            showAlert(`Summarization failed: ${error.message}`, 'danger');
            summaryArea.style.display = 'none';
        }
    }

    // Display summary results
    function displaySummary(summary) {
        const summaryContent = document.getElementById('summaryContent');
        summaryContent.innerHTML = `
            <textarea class="form-control" rows="5" id="summaryText" readonly>${summary}</textarea>
            <button class="btn btn-sm btn-outline-primary mt-3" id="copySummaryBtn">
                <i class="fas fa-copy me-1"></i> Copy Summary
            </button>
        `;
        
        // Set up copy summary button
        document.getElementById('copySummaryBtn').onclick = () => {
            const textarea = document.getElementById('summaryText');
            textarea.select();
            document.execCommand('copy');
            showAlert('Summary copied to clipboard!', 'success');
        };
        
        summaryArea.style.display = 'block';
    }

    // Helper function to show alerts
    function showAlert(message, type) {
        const alert = document.createElement('div');
        alert.className = `alert alert-${type} alert-dismissible fade show`;
        alert.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        
        // Add to page (you might want to create a dedicated alerts container)
        const container = document.querySelector('.converter-box');
        container.prepend(alert);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 150);
        }, 5000);
    }

    // Initialize everything
    function init() {
        updateSupportedFormats();
        setupConversionOptions();
        setupFileHandling();
        setupConvertButton();
        updateUIForConversionType();
    }

    // Start the application
    init();
});
</script>

@endsection