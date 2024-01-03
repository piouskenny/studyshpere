<?php

namespace App\Http\Services\Courses;

class CourseEnrollmentService
{
    public function enrollStudent($course_id, $tutor_id, $student_id)
    {
        $data  = [
            'Course ID' => $course_id,
            'Tutor ID' => $tutor_id,
            'Studnet ID' => $student_id
        ];

        return $data;
        /**
         * Check if User already enrolled
         */

        //  Logic Here

        /**
         * Enroll student by creating an enrollment table
         */

        //Logic Here too

        // return Success Response Here
    }
}
