<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\SuccessStoriesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


// Guest routes for admin
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [AdminRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminRegisterController::class, 'register'])->name('register.submit');

    // Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // // Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Show manual reset password form
    Route::get('/manual-password-reset', [ResetPasswordController::class, 'showManualResetForm'])->name('manual.reset.form');

    // Handle manual password reset POST
    Route::post('/manual-password-reset', [ResetPasswordController::class, 'manualReset'])->name('manual.reset');
});

// Authenticated admin routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('login.submit');

    Route::resource('courses', CourseController::class);
    Route::resource('success_stories', SuccessStoriesController::class);

    Route::resource('gallery', GalleryController::class);
    Route::post('gallery/upload-image', [GalleryController::class, 'uploadImage'])->name('gallery.uploadImage');
    Route::post('gallery/delete-image', [GalleryController::class, 'deleteImage'])->name('gallery.deleteImage');
    Route::post('gallery/fetch-images', [GalleryController::class, 'fetchImages'])->name('gallery.fetchImages');
});
