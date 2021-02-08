<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','country_id'
    ];
    public function country()
    {
        return $this->belongsTo('App\Models\Core_Data\Country','country_id');
    }
    public function area()
    {
        return $this->hasMany('App\Models\Core_Data\Area');
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
    protected $table = 'cities';
    public $timestamps = true;
}