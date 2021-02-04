<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Doctor extends Model
{
    use HasTranslations;
    protected $fillable = [
        'university','detail','user_id','specialty_id','scientific_degree_id','university', 'status_request', 'status_mobile','status_home','license',
        'image_license','image_university','count_view','year_experience','valuation','title_doctor','date_license_end'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function specialty()
    {
        return $this->belongsTo('App\Models\Core_Data\Specialty','specialty_id');
    }
    public function scientific_degree()
    {
        return $this->belongsTo('App\Models\Core_Data\Scientific_Degree','scientific_degree_id');
    }
    public function sub_specialty()
    {
        return $this->belongsToMany('App\Models\Core_Data\Sub_Specialty', 'doctor_sub_specialties', 'doctor_id','sub_specialty_id')->withTimestamps('created_at','updated_at');
    }
    public $translatable = ['detail','university','title_doctor'];
    protected $table = 'doctors';
    public $timestamps = true;
}
