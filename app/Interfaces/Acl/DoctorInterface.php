<?php

namespace App\Interfaces\Acl;

use App\Http\Requests\Acl\Doctor\StatusEditRequest;
use Illuminate\Http\Request;


interface DoctorInterface{
    public function Get_All_Data();
    public function Get_One_Data($id);
    public function Update_Status_One_Data($id);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(StatusEditRequest $request);
    public function Get_List_Data_By_Name($title);
}