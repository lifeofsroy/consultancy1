<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Service;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'purpose',
        'service_id',
        'course_id',
        'institution_id',
        'desc',
        'datetime',
    ];

    protected $table = "appointment_forms";

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
