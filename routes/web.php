<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Course\CourseController;
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
Route::get('user/course_content/{course_id}', [UserController::class, 'singleCourse'])->name('studentSingleCourse')->middleware('user_auth');
Route::get('/user/courses', [UserController::class, 'all_courses'])->name('user_all_courses')->middleware('user_auth');
Route::get('/user/course/{id}', [UserController::class, 'view_course'])->name('singleCourseDetails')->middleware('user_auth');
Route::get('/user/logoutPage', [UserController::class, 'logoutPage'])->name('user_logoutPage')->middleware('user_auth');
Route::get('/users/Video_learning/{content_id}', [UserController::class, 'learnSingleCourse'])->name('user_learnSingleCourse')->middleware('user_auth');
Route::get('/user/feedback/{course_id}', [UserController::class, 'feedback'])->name('user_feedback')->middleware('user_auth');;
Route::post('/user/feedback', [UserController::class, 'submitFeedback'])->name('user_submitfeedback');
Route::post('/user/submitProgress', [UserController::class, 'submitProgress'])->name('user_submitProgress');
Route::post('/user/submitCompleted', [UserController::class, 'submitCompletedCourse'])->name('user_submitCompletedCourse');
Route::post('/user/SubmitAssessment', [UserController::class, 'SubmitAssessment'])->name('user_SubmitAssessment');

// Assessment Endpoint
Route::get('/user/take/assessemt/{courseId}', [UserController::class, 'takeAssessment'])->name('user_takeAssesment')->middleware('user_auth');;;


/**
 *  Tutor Auth and Dashboard Controller
 */
Route::get('/tutor_signup', [TutorAuthController::class, 'signup'])->name('tutor_signup_page');
Route::post('/tutor_signup', [TutorAuthController::class, 'create'])->name('tutor_sigup');
Route::get('/tutor_dashboard', [TutorController::class, 'dashboard'])->name('tutor_dashboard')->middleware('tutor_auth');
Route::get('/tutor_createCourse', [TutorController::class, 'createCourse'])->name('tutor_createCourse')->middleware('tutor_auth');
Route::post('/tutor_storeCourse', [TutorController::class, 'storeCourse'])->name('tutor_storeCourse')->middleware('tutor_auth');
Route::get('tutor/students', [TutorController::class, 'students'])->name('tutor_students')->middleware('tutor_auth');
Route::get('/tutor/logoutPage', [TutorController::class, 'logoutPage'])->name('tutor_logoutPage')->middleware('tutor_auth');
Route::get('/tutor/logout', [TutorAuthController::class, 'logout'])->name('tutor_logout')->middleware('tutor_auth');
Route::get('tutor/feedbacks', [TutorController::class, 'feedbacks'])->name('tutor_feedbacks')->middleware('tutor_auth');
//assessment endpiont
Route::get('tutor/create-assessment/{course_id}', [TutorController::class, 'createAssessmentPage'])->name('createAssessment')->middleware('tutor_auth');
Route::post('tutor/createAssesment', [TutorController::class, 'createAssesment'])->name('createAssementPost')->middleware('tutor_auth');
Route::get('tutor/update-assessment/{assessmentID}', [TutorController::class, 'updateAssessmentPage'])->name('updateAssessment')->middleware('tutor_auth');
Route::post('tutor/updateAssesment', [TutorController::class, 'updateAssessment'])->name('updateAssementPost')->middleware('tutor_auth');
Route::post('/tutor/deleteAssessment/{id}', [TutorController::class, 'delete_assessment'])->name('delete_assessment')->middleware('tutor_auth');



/**
 *  Admin Auth and Dashboard Controller
 */
Route::get('/admin/signup', [AdminAuthController::class, 'signup'])->name('admin_signup');
Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin_login');
Route::post('/admin_signup', [AdminAuthController::class, 'store'])->name('admin_signup_func');
Route::post('/admin_login', [AdminAuthController::class, 'check'])->name('admin_login_func');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard')->middleware('admin_auth');
Route::get('/admin/addTutor', [AdminController::class, 'add_tutor'])->name('admin_addTutor')->middleware('admin_auth');
Route::post('/admin/addTutor', [AdminController::class, 'save_tutor'])->name('admin_saveTutor')->middleware('admin_auth');
Route::get('/admin/viewTutor/{id}', [AdminController::class, 'view_tutor'])->name('admin_view_tutor')->middleware('admin_auth');
Route::post('/admin/deleteTutor/{id}', [AdminController::class, 'delete_tutor'])->name('admin_delete_tutor')->middleware('admin_auth');
Route::get('/admin/Single/{course_id}', [AdminController::class, 'singleCourse'])->name('admin_singleCourse')->middleware('admin_auth');
Route::post('/admin/deleteCourse/{id}', [AdminController::class, 'delete_course'])->name('admin_delete_course')->middleware('admin_auth');


/**
 * Special Courses endpoints
 */
Route::get('course-content/{course_id}', [TutorController::class, 'createCourseContent'])->name('createCourseContent')->middleware('tutor_auth');
Route::post('create/course/content', [CourseController::class, 'createCourseContent'])->name('createCourseContentPost');
Route::get('course/Single/{course_id}', [TutorController::class, 'singleCourse'])->name('tutorSingleCourse')->middleware('tutor_auth');
