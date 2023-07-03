<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'image',
        'short',
        'status',
    ];

    protected $table = "service_categories";

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
