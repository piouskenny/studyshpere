<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Courses\CourseEnrollmentService;

class EnrollController extends Controller
{
    public function __invoke($course_id)
    {
        $user = User::where('id', '=', session('User'))->first();
        $course = Courses::find($course_id);
        $tutor_id = $course->tutor_id;

        if (!$user) {
            return redirect(route('login_page'));
        }

        $enrollmentService = new CourseEnrollmentService();
        $status = $enrollmentService->enrollStudent($course_id, $tutor_id, $user->id);

        if ($status == false) {
            return back()->with('failed', 'You have already enrolled for this course ');
        } elseif ($status == true) {
            return redirect(route('dashboard'))->with('success', 'Course Enrollment was Succesful');
        }
    }
}
