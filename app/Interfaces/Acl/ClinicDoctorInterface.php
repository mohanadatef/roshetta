<?php

namespace App\Interfaces\Acl;


interface ClinicDoctorInterface{
    public function Get_All_Data();
    public function Create_Data($doctor);
}