<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Assesment;
use App\Models\CourseContent;
use App\Models\CourseEnrollment;
use App\Models\CourseLearningProgress;
use App\Models\Courses;
use App\Models\Feedback;
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

        $assessments = Assesment::where('course_id', $course_id)->get();


        if ($assessments->count() < 1) {
            $assessment = false;
        } else {
            $assessment = true;
        }

        // dd($assessments);

        return view(
            'Users.singleCourse',
            [
                'course' => $course,
                'courseContent' => $courseContent,
                'tutor' => $tutor,
                'assessment' => $assessment
            ]
        )->with('user', $user);
    }

    public function learnSingleCourse($content_id)
    {
        $singleVideo = CourseContent::find($content_id);

        $user = User::where('id', '=', session('User'))->first();

        $singleVideo = CourseContent::find($content_id);

        $course = Courses::find($singleVideo->courses_id);

        $courseProgress = CourseLearningProgress::where('content_id', $content_id)->first();

        if ($courseProgress == null) {
            $status = false;
        } else if ($courseProgress->completed == true) {
            $status = true;
        } else {
            $status = false;
        }

        return view(
            'Users.learnsingleCourse',
            [
                'singleVideo' => $singleVideo,
                'course' => $course,
                'course_progress' => $status
            ]
        )->with('user', $user);
    }

    /**
     *Page for User  to create feedback
     */

    public function feedback($course_id)
    {
        $user = User::where('id', '=', session('User'))->first();
        $course = Courses::find($course_id);
        $tutor_id = Tutor::where('id', $course->tutor_id)->first();

        return view(
            'Users.feedback',
            [
                'user' => $user,
                'course' => $course,
                'tutor_id' => $tutor_id
            ]
        )->with('user', $user);
    }

    /**
     * Submit Feedback
     */
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'feedback_message' => 'required'
        ]);

        $course = Courses::find($request->course_id)->first();


        $feedback = Feedback::create([
            'user_id' => $request->user_id,
            'tutor_id' => $request->tutor_id,
            'course' => $course->course_name,
            'feedback_message' => $request->feedback_message,
        ]);

        return back()->with('success', 'Feedback was submitted successfully');
    }


    /**
     * course content progress
     */

    public function submitProgress(Request $request)
    {
        $request->validate([
            'completed' => 'required',
        ]);


        if ($request->completed == 'completed') {
            $status =  true;
        }

        CourseLearningProgress::create([
            'user_id' => $request->user_id,
            'content_id' => $request->content_id,
            'completed' => $status
        ]);

        return back()->with('success', 'Course Completed');


        dd($request->all());
    }


    public function takeAssessment($courseId)
    {
        $user = User::where('id', '=', session('User'))->first();

        $assessments = Assesment::where('course_id', $courseId)->orderBy('created_at', 'desc')->paginate(1);

        return view(
            'Users.takeAssessment',
            [
                'assessments' => $assessments
            ]
        )->with('user', $user);
    }

    public function logoutPage()
    {
        $user = User::where('id', '=', session('User'))->first();

        return view('Users.logout')->with('user', $user);
    }
}
