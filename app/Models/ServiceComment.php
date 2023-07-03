<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'service_id',
        'user_id',
        'rating',
        'status'
    ];

    protected $table = 'service_comments';

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
