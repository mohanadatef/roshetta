<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Doctor_Sub_Specialty extends Model
{
    protected $fillable = [
        'doctor_id','sub_specialty_id'
    ];
    protected $table = 'doctor_sub_specialties';
    public $timestamps = true;
}
