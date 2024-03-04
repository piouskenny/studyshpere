<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phonenumber',
        'profile_picture',
        'courses',
        'password'
    ];

    public function courses()
    {
        return $this->hasMany(Courses::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    use HasFactory;
}
