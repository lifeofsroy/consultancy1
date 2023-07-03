<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFaq extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
    ];

    protected $table = "home_faqs";
}
