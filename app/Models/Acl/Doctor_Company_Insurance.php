<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Doctor_Company_Insurance extends Model
{
    protected $fillable = [
        'doctor_id','company_insurance_id'
    ];
    protected $table = 'doctor_company_insurances';
    public $timestamps = true;
}
