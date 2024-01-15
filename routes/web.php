<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Course\EnrollController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Tutor\TutorAuthController;
use App\Http\Controllers\Tutor\TutorController;
use App\Http\Controllers\Users\UserAuthController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


/**
 * I SHOULD HAVE USED GROUPED ROUTE INSTEAD
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/courses/{id}', [HomeController::class, 'singleCourse'])->name('singleCourses');



/**
 * Course Enrollment Endpoint
 */
Route::post('/enroll/{course_id}', EnrollController::class)->name('enroll');

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
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('user_auth');
Route::get('/user/profile', [UserController::class, 'profile'])->name('profile')->middleware('user_auth');


/** 
 *  Tutor Auth and Dashboard Controller
 */
Route::get('/tutor_signup', [TutorAuthController::class, 'signup'])->name('tutor_signup_page');
Route::post('/tutor_signup', [TutorAuthController::class, 'create'])->name('tutor_sigup');

Route::get('/tutor_dashboard', [TutorController::class, 'dashboard'])->name('tutor_dashboard')->middleware('tutor_auth');
Route::get('/tutor_createCourse', [TutorController::class, 'createCourse'])->name('tutor_createCourse')->middleware('tutor_auth');
Route::post('/tutor_storeCourse', [TutorController::class, 'storeCourse'])->name('tutor_storeCourse')->middleware('tutor_auth');
Route::get('tutor/students', [TutorController::class, 'students'])->name('tutor_students')->middleware('tutor_auth');

/** 
 *  Admin Auth and Dashboard Controller
 */
Route::get('/admin_signup', [AdminAuthController::class, 'signup'])->name('admin_signup');
Route::get('/admin_login', [AdminAuthController::class, 'login'])->name('admin_login');
Route::post('/admin_signup', [AdminAuthController::class, 'store'])->name('admin_signup_func');
Route::post('/admin_login', [AdminAuthController::class, 'check'])->name('admin_login_func');
Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard')->middleware('admin_auth');
