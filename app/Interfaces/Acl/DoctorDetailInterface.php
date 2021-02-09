<?php

namespace App\Interfaces\Acl;

use App\Http\Requests\Acl\Doctor\CreateRequest;
use App\Http\Requests\Acl\Doctor\EditRequest;

interface DoctorDetailInterface{
    public function Get_One_Data($user_id);
    public function Update_Status_One_Data($id);
    public function Update_View($id);
    public function Get_One_Data_Translation($id);
    public function Get_One_By_Code($code);
    public function Update_Data(EditRequest $request, $id);
    public function Create_Data(CreateRequest $request);
}