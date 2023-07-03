<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
    ];

    protected $table = "term_conditions";
}
