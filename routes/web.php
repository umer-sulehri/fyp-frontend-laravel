<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideoToTextController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showAuthForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes (require authentication)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', function () {
//         return view('pages.home');
//     })->name('home');

//     Route::get('/about', function () {
//         return view('pages.about');
//     });

//     Route::get('/pricing', function () {
//         return view('pages.pricing');
//     });

//     Route::get('/contact', function () {
//         return view('pages.contact');
//     });

//     Route::get('/features', function () {
//         return view('pages.features');
//     });

//     Route::get('/userdashboard', function () {
//         return view('dashboards.dashboard');
//     });
// });
Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/pricing', function () {
    return view('pages.pricing');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/features', function () {
    return view('pages.features');
});

Route::get('/userdashboard', function () {
    return view('dashboards.dashboard');
});
// Optional routes for terms and privacy
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy', 'privacy')->name('privacy');






Route::get('/video-to-text', [VideoToTextController::class, 'index']);
Route::post('/convert', [VideoToTextController::class, 'convert']);
Route::post('/test-ffmpeg', [VideoToTextController::class, 'testFfmpeg']);
Route::get('/test-openai', [VideoToTextController::class, 'testOpenAI']);