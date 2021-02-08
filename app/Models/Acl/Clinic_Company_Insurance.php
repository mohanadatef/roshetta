<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Clinic_Company_Insurance extends Model
{
    protected $fillable = [
        'clinic_id','company_insurance_id'
    ];
    protected $table = 'clinic_company_insurances';
    public $timestamps = true;
}
