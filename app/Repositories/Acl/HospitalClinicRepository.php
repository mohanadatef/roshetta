<?php

namespace App\Repositories\Acl;

use App\Interfaces\Acl\HospitalClinicInterface;
use App\Models\Acl\Hospital_Clinic;
use Illuminate\Support\Facades\Auth;

class HospitalClinicRepository implements HospitalClinicInterface
{
    protected $clinic;

    public function __construct(Hospital_Clinic $clinic)
    {
        $this->clinic = $clinic;
    }

    public function Get_All_Data()
    {
        return $this->clinic->with('clinic')->where('hospital_id',Auth::user()->hospital->id)->get();
    }

    public function Create_Data($clinic)
    {
        if(!$this->clinic->where('hospital_id',Auth::user()->hospital->id)->where('clinic_id',$clinic)->exists())
        {
        $data['clinic_id']=$clinic;
        $data['hospital_id']=Auth::user()->hospital->id;
        return $this->clinic->create($data);
        }
        return true;
    }
}
