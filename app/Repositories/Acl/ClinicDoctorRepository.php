<?php

namespace App\Repositories\Acl;

use App\Interfaces\Acl\ClinicDoctorInterface;
use App\Models\Acl\Clinic_Doctor;
use Illuminate\Support\Facades\Auth;

class ClinicDoctorRepository implements ClinicDoctorInterface
{
    protected $clinic;

    public function __construct(Clinic_Doctor $clinic)
    {
        $this->clinic = $clinic;
    }

    public function Get_All_Data()
    {
        return $this->clinic->with('doctor')->where('clinic_id',Auth::user()->clinic->id)->get();
    }

    public function Create_Data($doctor)
    {
        if(!$this->clinic->where('clinic_id',Auth::user()->clinic->id)->where('doctor_id',$doctor)->exists())
        {
        $data['clinic_id']=Auth::user()->clinic->id;
        $data['doctor_id']=$doctor;
        return $this->clinic->create($data);
        }
        return true;
    }
}
