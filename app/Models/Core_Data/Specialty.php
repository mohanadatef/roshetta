<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialty extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','image','title','order'
    ];
    public function sub_specialty()
    {
        return $this->hasMany('App\Models\Core_Data\Sub_Specialty');
    }
    public $translatable = ['title'];
    protected $table = 'specialties';
    public $timestamps = true;
}