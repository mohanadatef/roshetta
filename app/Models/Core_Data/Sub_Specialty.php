<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sub_Specialty extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','specialty_id'
    ];
    public function specialty()
    {
        return $this->belongsTo('App\Models\Core_Data\Specialty','specialty_id');
    }
    public function doctor()
    {
        return $this->belongsToMany('App\Models\Acl\Doctor', 'doctor_sub_specialties', 'doctor_id','sub_specialty_id')->withTimestamps('created_at','updated_at');
    }
    public $translatable = ['title'];
    protected $table = 'sub_specialties';
    public $timestamps = true;
}