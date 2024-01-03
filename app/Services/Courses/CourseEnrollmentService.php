<?php

namespace App\Services\Courses;

use App\Models\CourseEnrollment;

class CourseEnrollmentService
{
    public function enrollStudent($course_id, $tutor_id, $student_id)
    {
        /**
         * Check if User already enrolled
         */
        $status = CourseEnrollment::where('course_id', $course_id)
            ->where('user_id', $student_id)
            ->get();

        if ($status->count() > 0) {
            return redirect(route('dashboard'))->with('success', 'user already enrolled for this course'); // Or return $data = 'user already enrolled';
        }

        /**
         * Enroll student by creating an enrollment table
         */
        $enroll = CourseEnrollment::create([
            'course_id' => $course_id,
            'tutor_id' => $tutor_id,
            'user_id' => $student_id
        ]);

        if (!$enroll) {
            return $data = 'Falied';
        }


        return redirect(route('dashboard'))->with('success', 'user already enrolled for this course'); // Or return $data = 'user already enrolled';

    }
}
