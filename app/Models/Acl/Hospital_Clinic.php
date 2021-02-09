<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Hospital_Clinic extends Model
{
    protected $fillable = [
        'hospital_id','clinic_id'
    ];
    public function hospital()
    {
        return $this->belongsTo('App\Models\Acl\Hospital', 'hospital_id');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Acl\Clinic', 'clinic_id');
    }
    protected $table = 'hospital_clinics';
    public $timestamps = true;
}
