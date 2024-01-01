<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Tutor\TutorAuthController;
use App\Http\Controllers\Tutor\TutorController;
use App\Http\Controllers\Users\UserAuthController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

/** 
 *  User Auth and Dashboard Controller
 */

Route::get('/signup', [UserAuthController::class, 'signup'])->name('signup_page');
Route::post('/signup', [UserAuthController::class, 'create'])->name('signup');
Route::get('/login', [UserAuthController::class, 'login'])->name('login_page');
Route::post('/login', [UserAuthController::class, 'check'])->name('login');
Route::post('/verify_otp', [UserAuthController::class, 'verify_otp'])->name('verify_otp');
Route::get('verify_otp_page', [UserAuthController::class, 'verify_otp_page'])->name('verify_otp_page');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout')->middleware('user_auth');


Route::get('/user_dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('user_auth');
Route::get('/user_profile', [UserController::class, 'profile'])->name('profile')->middleware('user_auth');


/** 
 *  Tutor Auth and Dashboard Controller
 */

Route::get('/tutor_signup', [TutorAuthController::class, 'signup'])->name('tutor_signup_page');
Route::post('/tutor_signup', [TutorAuthController::class, 'create'])->name('tutor_sigup');

Route::get('/tutor_dashboard', [TutorController::class, 'dashboard'])->name('tutor_dashboard')->middleware('tutor_auth');
Route::get('/tutor_createCourse', [TutorController::class, 'createCourse'])->name('tutor_createCourse')->middleware('tutor_auth');
Route::post('/tutor_storeCourse', [TutorController::class, 'storeCourse'])->name('tutor_storeCourse')->middleware('tutor_auth');


/** 
 *  Admin Auth and Dashboard Controller
 */
