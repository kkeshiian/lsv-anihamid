<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UmrohPackageController;
use App\Http\Controllers\Admin\HajiPackageController;
use App\Http\Controllers\Admin\ManasikVideoController;
use App\Http\Controllers\Admin\WebsiteContentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Umroh & Haji Packages
Route::get('/paket-umroh', [PackageController::class, 'umroh'])->name('packages.umroh');
Route::get('/paket-umroh/{package}', [PackageController::class, 'umrohDetail'])->name('packages.umroh.detail');
Route::get('/paket-haji', [PackageController::class, 'haji'])->name('packages.haji');
Route::get('/paket-haji/{package}', [PackageController::class, 'hajiDetail'])->name('packages.haji.detail');

// Manasik Videos
Route::get('/video-manasik', [PackageController::class, 'videos'])->name('videos');

// Admin Routes (Protected by auth and admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Umroh Packages Management
    Route::resource('umroh', UmrohPackageController::class);
    
    // Haji Packages Management
    Route::resource('haji', HajiPackageController::class);
    
    // Manasik Videos Management
    Route::resource('videos', ManasikVideoController::class);
    
    // Website Content Management
    Route::get('content', [WebsiteContentController::class, 'index'])->name('content.index');
    Route::get('content/{content}/edit', [WebsiteContentController::class, 'edit'])->name('content.edit');
    Route::put('content/{content}', [WebsiteContentController::class, 'update'])->name('content.update');
});
