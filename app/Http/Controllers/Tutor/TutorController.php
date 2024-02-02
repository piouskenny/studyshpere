<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use App\Models\CourseEnrollment;
use App\Models\Courses;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use tidy;

class TutorController extends Controller
{
    public function dashboard()
    {
        $tutor = Tutor::find(session('Tutor'));

        $courses = Courses::where('tutor_id', $tutor->id)->get();
        $courseCount = $tutor->courses()->count();


        return view(
            'Tutor.dashboard',
            [
                'course' => $courseCount,
                'courses' => $courses,
            ]
        )->with('tutor', $tutor);
    }


    public function createCourse()
    {
        $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        return view('Tutor.CreateCourse')->with('tutor', $tutor);
    }


    /**
     * Course Creation method
     */
    public function storeCourse(Request $request)
    {
        $request->validate([
            'course_name' => 'string',
            'course_type' => 'string',
            'description' => 'required',
            'tutor' => 'integer',
            'course_image' => 'required|mimes:png,jpg,jpeg|max:3072'
        ]);


        $course_image_name = time() . '-' . $request->course_name . '.' . $request->course_image->extension();

        $request->course_image->move(public_path('course_img'), $course_image_name);

        $course = Courses::create([
            'course_name' => $request->course_name,
            'course_type' => $request->course_type,
            'description'  => $request->description,
            'tutor_id' => $request->tutor,
            'course_image' => $course_image_name
        ]);

        return redirect(route('tutor_dashboard'))->with('success', 'course created successfully');
    }


    /**
     * See List of student that enrolled for your course
     */
    public function students()
    {
        $tutor_id =  session('Tutor');
        $tutor = Tutor::where('id', $tutor_id)->first();

        $courses_enrollment_list = CourseEnrollment::where('tutor_id', $tutor_id)->get();

        $students = [];

        /**
         * Get all the students data that has enrolled for your course
         */
        foreach ($courses_enrollment_list as $student) {
            $studentModel = User::where('id', $student->user_id)->first();
            if ($studentModel) {
                $students[] = $studentModel;
            }
        }

        return view(
            'Tutor.students',
            [
                'students' => $students,
            ]
        )->with('tutor', $tutor);
    }


    public function createCourseContent($id)
    {
        $course = Courses::find($id);

        $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        return view(
            'Tutor.CreateCourseContent',
            [
                'course' => $course
            ]
        )->with('tutor', $tutor);
    }

    public function singleCourse($course_id)
    {
        $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        $course = Courses::find($course_id);

        $courseContent = CourseContent::where('courses_id', $course_id)->get();



        return view(
            'Tutor.singleCourse',
            [
                'course' => $course,
                'courseContent' => $courseContent
            ]
        )->with('tutor', $tutor);
    }
}
