<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'service_id',
        'status',
        'featured',
    ];

    protected $table = "faqs";

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
