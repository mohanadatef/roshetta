<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Clinic_Doctor extends Model
{
    protected $fillable = [
        'doctor_id','clinic_id'
    ];
    public function doctor()
    {
        return $this->belongsTo('App\Models\Acl\Doctor', 'doctor_id');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Acl\Doctor', 'clinic_id');
    }
    protected $table = 'clinic_doctors';
    public $timestamps = true;
}
