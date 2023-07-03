<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'desc',
        'phone',
        'email',
    ];

    protected $table = "home_appointments";
}
