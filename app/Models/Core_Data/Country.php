<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','image','title','order'
    ];
    public function city()
    {
        return $this->hasMany('App\Models\Core_Data\City');
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
    protected $table = 'countries';
    public $timestamps = true;
}