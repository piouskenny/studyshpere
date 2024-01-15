<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Courses;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public $courses;
    public $student;
    public $tutors;

    public function dashboard()
    {
        $admin = Admin::find(session('Admin'))->first();
        $this->courses = Courses::all();
        $this->student = User::all();
        $this->tutors = Tutor::all();


        $course_count =  $this->courses->count();
        $student_count =  $this->student->count();
        $tutor_count =  $this->tutors->count();



        return view(
            'Admin.dashboard',
            [
                'students' => $this->student,
                'courses' => $this->courses,
                'tutors' => $this->tutors,
                'course_count' => $course_count,
                'student_count' => $student_count,
                'tutor_count' => $tutor_count
            ]
        )->with('admin', $admin);
    }

    public function add_tutor()
    {
        $admin = Admin::find(session('Admin'))->first();

        return view('Admin.addTutor')->with('admin', $admin);
    }

    public function save_tutor(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);


        $tutor = Tutor::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('admin_dashboard'))->with('success', 'Tutor has been added succesfully');
    }
}
