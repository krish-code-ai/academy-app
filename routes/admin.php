<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use Illuminate\Support\Facades\Route;

// Route::middleware('guest:admin')->group(function () {
//     Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('login');
//     Route::post('/login', [AdminLoginController::class, 'login'])->name('login-admin');
// });


// // Route::middleware('auth:admin')->get('/admin/dashboard', HomeController::class)->name('admin.dashboard');

// // Route::get('dashboard', [HomeController::class, 'index']);


// Route::middleware('auth:admin')->group(function () {
//     Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
// });


// Guest routes for admin
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [AdminRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminRegisterController::class, 'register'])->name('register.submit');
});

// Authenticated admin routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});
