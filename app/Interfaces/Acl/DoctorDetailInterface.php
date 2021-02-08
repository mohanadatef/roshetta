<?php

namespace App\Interfaces\Acl;

interface DoctorDetailInterface{
    public function Get_One_Data($user_id);
    public function Update_Status_One_Data($id);
    public function Update_View($id);
    public function Get_One_Data_Translation($id);
    public function Get_One_By_Code($code);
}