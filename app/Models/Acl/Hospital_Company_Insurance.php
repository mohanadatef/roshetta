<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Hospital_Company_Insurance extends Model
{
    protected $fillable = [
        'hospital_id','company_insurance_id'
    ];
    protected $table = 'hospital_company_insurances';
    public $timestamps = true;
}
