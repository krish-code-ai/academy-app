<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PageController;

// Route::get('/', function () {
//     return view('site/index');
// });

Route::get('/', [HomeController::class, 'getIndex'])->name('home');
Route::get('/about-us', [PageController::class, 'get_about']);
Route::get('/blogs', [PageController::class, 'get_blogs']);
Route::get('/courses', [PageController::class, 'get_courses']);
Route::get('/student_life', [PageController::class, 'get_student_life']);
Route::get('/student_life_single', [PageController::class, 'get_student_life_single']);
Route::get('/contact', [PageController::class, 'get_contact']);
