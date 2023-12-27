<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\UserAuthController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// User
Route::get('/signup', [UserAuthController::class, 'signup'])->name('signup_page');
Route::post('/signup', [UserAuthController::class, 'create'])->name('signup');
Route::get('/login', [UserAuthController::class, 'login'])->name('login_page');
Route::post('/login', [UserAuthController::class, 'check'])->name('login');
Route::post('/verify_otp', [UserAuthController::class, 'verify_otp'])->name('verify_otp');
Route::get('verify_otp_page', [UserAuthController::class, 'verify_otp_page'])->name('verify_otp_page');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout')->middleware('user_auth');


Route::get('/user_dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('user_auth');
Route::get('/user_profile', [UserController::class, 'profile'])->name('profile')->middleware('user_auth');
