<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLearningProgress extends Model
{
    protected $fillable = [
        'user_id',
        'content_id',
        'completed',
    ];
    use HasFactory;

    public function courseContent()
    {
        return $this->belongsTo(CourseContent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
