<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hospital extends Model
{
    use HasTranslations;
    protected $fillable = [
        'detail','status_request','license','image_license','count_view','valuation','title','date_license_end','image','address','mobile','country_id','city_id','area_id','user_id',
        'code_number'
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
        return $this->belongsToMany('App\Models\Core_Data\Company_Insurance', 'hospital_company_insurances', 'hospital_id','company_insurance_id')->withTimestamps('created_at','updated_at');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function branch()
    {
        return $this->hasMany('App\Models\Acl\Hospital_Branch');
    }
    public function clinic()
    {
        return $this->belongsToMany('App\Models\Acl\Clinic', 'hospital_clinics', 'clinic_id','hospital_id')->withTimestamps('created_at','updated_at');
    }
    public $translatable = ['detail','address','title'];
    protected $table = 'hospitals';
    public $timestamps = true;
}
