<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_id',
        'course_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
