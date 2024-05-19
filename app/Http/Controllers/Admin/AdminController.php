<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CourseContent;
use App\Models\Courses;
use App\Models\Tutor;
use App\Models\TutorInfo;
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
        $this->courses = Courses::paginate(6);
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


    public function view_tutor($id)
    {
        $admin = Admin::find(session('Admin'))->first();
        $tutor = Tutor::find($id)->first();
        $courses = Courses::where('tutor_id', $id)->get();

        return view(
            'Admin.viewTutor',
            [
                'tutor' => $tutor,
                'courses' => $courses,
            ]
        )->with('admin', $admin);
    }

    public function view_tutorInfo($id)
    {
        $admin = Admin::find(session('Admin'))->first();
        $tutor = Tutor::find($id)->first();
        $courses = Courses::where('tutor_id', $id)->get();
        $tutor_info = TutorInfo::where('tutor_id', $id)->first();


        dd($tutor_info->field_specialization);

        return view(
            'Admin.viewTutor',
            [
                'tutor' => $tutor,
                'courses' => $courses,
                'tutor_info' => $tutor_info
            ]

        )->with('admin', $admin);
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


    public function singleCourse($course_id)
    {
        $admin = Admin::find(session('Admin'))->first();
        $course = Courses::find($course_id);
        $courseContent = CourseContent::where('courses_id', $course_id)->get();

        return view(
            'admin.singleCourse',
            [
                'course' => $course,
                'courseContent' => $courseContent
            ]
        )->with('admin', $admin);
    }



    public function delete_tutor($id)
    {
        Tutor::destroy($id);

        return redirect(route('admin_dashboard'))->with('success', 'Tutor has been deleted succesfully');
    }


    public function delete_course($id)
    {
        Courses::destroy($id);

        return redirect(route('admin_dashboard'))->with('success', 'course has been deleted succesfully');
    }
}
