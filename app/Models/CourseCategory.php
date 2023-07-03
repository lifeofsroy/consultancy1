<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    protected $table = "course_categories";

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
