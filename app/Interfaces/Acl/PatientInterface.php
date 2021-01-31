<?php

namespace App\Interfaces\Acl;

use App\Http\Requests\Acl\Patient\CreateRequest;
use App\Http\Requests\Acl\Patient\EditRequest;
use App\Http\Requests\Acl\Patient\StatusEditRequest;
use Illuminate\Http\Request;


interface PatientInterface{
    public function Get_All_Data();
    public function Get_One_Data($id);
    public function Create_Data(CreateRequest $request);
    public function Update_Data(EditRequest $request);
    public function Update_Status_One_Data($id);
    public function Get_Many_Data(Request $request);
    public function Login(Request $request);
    public function Logout($id);
    public function Update_Status_Data(StatusEditRequest $request);
    public function Check_Patient($email);
}