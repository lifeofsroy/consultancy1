<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'more',
        'question',
    ];

    protected $table = "faq_forms";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
