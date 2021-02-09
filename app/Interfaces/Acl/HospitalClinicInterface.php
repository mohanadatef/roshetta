<?php

namespace App\Interfaces\Acl;


interface HospitalClinicInterface{
    public function Get_All_Data();
    public function Create_Data($doctor);
}