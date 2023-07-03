<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'service_category_id',
        'short',
        'thumb',
        'image',
        'doc',
        'desc',
        'status',
        'featured',
    ];

    protected $table = "services";

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function serviceComments()
    {
        return $this->hasMany(ServiceComment::class);
    }
}
