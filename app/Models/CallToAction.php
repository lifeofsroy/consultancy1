<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallToAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'button',
        'btnurl',
        'image',
    ];

    protected $table = "call_to_actions";
}
