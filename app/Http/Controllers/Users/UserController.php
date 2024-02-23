<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use App\Models\CourseEnrollment;
use App\Models\Courses;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * User Dashboard page Controller
     */
    public function Dashboard()
    {
        $user_id = session('User');
        $user = User::where('id', '=', $user_id)->first();
        $courses_enrollment = CourseEnrollment::where('user_id', $user_id)->get();
        $courses = [];

        foreach ($courses_enrollment as $course) {
            $courseModel = Courses::where('id', $course->course_id)->first();
            if ($courseModel) {
                $courses[] = $courseModel;
            }
        }

        $courses_enrolled = count($courses);

        return view('Users.dashboard', [
            'courses_enrolled' => $courses_enrolled,
            'courses' => $courses,
        ])->with('user', $user);
    }



    /**
     * User Profile Page
     */
    public function Profile()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('Users.profile')->with('user', $user);
    }



    /**
     * View of all the avaliable courses
     *
     */
    public function all_courses()
    {
        $user = User::where('id', '=', session('User'))->first();
        $courses = Courses::paginate(6);

        return view(
            'Users.courses',
            [
                'courses' => $courses,
            ]
        )->with('user', $user);
    }



    /**
     * Signle course detials 
     */

    public function view_course($id)
    {
        $user = User::where('id', '=', session('User'))->first();
        $course = Courses::find($id);

        return view(
            'Users.coursedetails',
            [
                'course' => $course
            ]
        )->with('user', $user);
    }


    /**
     * User can view their signle course detials
     *
     */

    public function singleCourse($course_id)
    {
        $user = User::where('id', '=', session('User'))->first();
        $course = Courses::find($course_id);

        $courseContent = CourseContent::where('courses_id', $course_id)->get();
        $tutor = Tutor::where('id', $course->tutor_id)->first();

        return view(
            'Users.singleCourse',
            [
                'course' => $course,
                'courseContent' => $courseContent,
                'tutor' => $tutor,
            ]
        )->with('user', $user);
    }

    public function learnSingleCourse($content_id)
    {
        $singleVideo = CourseContent::find($content_id);

        $user = User::where('id', '=', session('User'))->first();

        $singleVideo = CourseContent::find($content_id);

        return view(
            'Users.learnsingleCourse',
            [
                'singleVideo' => $singleVideo
            ]
        )->with('user', $user);
    }

    public function submitProgress(Request $request) 
    {
        dd($request->all());
    }

    public function logoutPage()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('Users.logout')->with('user', $user);
    }
}
