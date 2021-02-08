<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hospital_Branch extends Model
{
    use HasTranslations;
    protected $fillable = [
        'hospital_id','title','address','country_id','city_id','area_id'
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
    public function hospital()
    {
        return $this->belongsTo('App\Models\Acl\Hospital','hospital_id');
    }
    public $translatable = ['address','title'];
    protected $table = 'hospital_branchs';
    public $timestamps = true;
}
