<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',

        'email',
        'phone',
        'alt_phone',

        'dob',
        'gender',

        'father_name',
        'mother_name',
        'guar_name',
        'guar_ph',

        'parma_city',
        'parma_po',
        'parma_ps',
        'parma_dist',
        'parma_state',
        'parma_pin',

        'addr_same',

        'corrent_city',
        'corrent_po',
        'corrent_ps',
        'corrent_dist',
        'corrent_state',
        'corrent_pin',

        'qualifi_name',
        'qualifi_year',
        'qualifi_coll',
        'qualifi_mark',

        'marksheet_img',
        'user_img',
        'course_id',
    ];

    protected $table = "admission_forms";

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
