<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'course_id',
        'user_id',
        'rating',
        'status'
    ];

    protected $table = 'course_comments';

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
