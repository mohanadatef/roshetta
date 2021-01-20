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
    public $translatable = ['title'];
    protected $table = 'cities';
    public $timestamps = true;
}