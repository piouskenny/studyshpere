<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Courses;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public $courses;
    public $student;
    public $tutor;

    public function dashboard()
    {
        $admin = Admin::find(session('Admin'))->first();
        $this->courses = Courses::all();
        $this->student = User::all();
        $this->tutor = Tutor::all();


        $course_count =  $this->courses->count();
        $student_count =  $this->student->count();
        $tutor_count =  $this->student->count();



        return view(
            'Admin.dashboard',
            [
                'course_count' => $course_count,
                'student_count' => $student_count,
                'tutor_count' => $tutor_count
            ]
        )->with('admin', $admin);
    }
}
