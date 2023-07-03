<?php

namespace App\Models;

use App\Models\Institution;
use App\Models\CourseComment;
use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'course_category_id',
        'institution_id',
        'short',
        'desc',
        'thumb',
        'image',
        'status',
        'featured',
        'doc',
    ];

    protected $table = "courses";

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function courseComments()
    {
        return $this->hasMany(CourseComment::class);
    }
}
