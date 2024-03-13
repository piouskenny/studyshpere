<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCompleted extends Model
{
    protected $fillable = [
        'user_id',
        'courses_id',
        'completed',
    ];
    use HasFactory;

    public function courses()
    {
        return $this->belongsTo(Courses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

}
