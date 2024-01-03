<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\Courses\CourseEnrollmentService;

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
        $enroll = $enrollmentService->enrollStudent($course_id, $tutor_id, $user->id);

        return dd($enroll);
    }
}
