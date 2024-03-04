<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable =
    [
        'user_id',
        'tutor_id',
        'course',
        'feedback_message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    use HasFactory;
}
