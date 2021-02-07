<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Company_Insurance extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','image'
    ];
    public function hospital()
    {
        return $this->belongsToMany('App\Models\Acl\Hospital', 'hospital_company_insurances', 'hospital_id','company_insurance_id')->withTimestamps('created_at','updated_at');
    }
    public $translatable = ['title'];
    protected $table = 'company_insurances';
    public $timestamps = true;
}