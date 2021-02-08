<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Clinic extends Model
{
    use HasTranslations;
    protected $fillable = [
        'detail','status_request','license','image_license','count_view','valuation','title','date_license_end','image','address','mobile','country_id','city_id',
        'area_id','user_id','specialty_id','status_type','code_number'
    ];
    public function country()
    {
        return $this->belongsTo('App\Models\Core_Data\Country','country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Core_Data\City','city_id');
    }
    public function area()
    {
        return $this->belongsTo('App\Models\Core_Data\Area','area_id');
    }
    public function company_insurance()
    {
        return $this->belongsToMany('App\Models\Core_Data\Company_Insurance', 'clinic_company_insurances', 'clinic_id','company_insurance_id')->withTimestamps('created_at','updated_at');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function branch()
    {
        return $this->hasMany('App\Models\Acl\Clinic_Branch');
    }
    public function specialty()
    {
        return $this->belongsTo('App\Models\Core_Data\Specialty','specialty_id');
    }
    public function doctor()
    {
        return $this->belongsToMany('App\Models\Acl\Doctor', 'clinic_doctors', 'clinic_id','doctor_id')->withTimestamps('created_at','updated_at');
    }
    public $translatable = ['detail','address','title'];
    protected $table = 'clinics';
    public $timestamps = true;
}
