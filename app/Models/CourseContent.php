<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable =
    [
        'courses_id',
        'content_type',
        'content_url',
        'order'
    ];
    use HasFactory;

    public function course()
    {
        return $this->belongsToMany(Courses::class);
    }
}
