<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_whatsapp',
        'wh_number',
        'is_tawk',
        'tawk_src',
    ];

    protected $table = "plugins";
}
