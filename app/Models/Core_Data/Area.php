<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Area extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','country_id','city_id'
    ];
    public function country()
    {
        return $this->belongsTo('App\Models\Core_Data\Country','country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Core_Data\City','city_id');
    }
    public function hospital()
    {
        return $this->hasMany('App\Models\Acl\Hospital');
    }
    public function hospital_branch()
    {
        return $this->hasMany('App\Models\Acl\Hospital_Branch');
    }
    public function clinic()
    {
        return $this->hasMany('App\Models\Acl\Clinic');
    }
    public $translatable = ['title'];
    protected $table = 'areas';
    public $timestamps = true;
}