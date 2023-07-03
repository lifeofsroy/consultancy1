<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumb',
        'image',
        'short',
        'location',
        'type',
        'contact',
        'website',
        'doc',
        'desc',
        'status',
        'featured',
        'mapurl',
    ];

    protected $table = "institutions";

    public function institutionComments()
    {
        return $this->hasMany(InstitutionComment::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
