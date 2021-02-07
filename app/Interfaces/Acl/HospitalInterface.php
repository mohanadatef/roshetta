<?php

namespace App\Interfaces\Acl;

use App\Http\Requests\Acl\Hospital\CreateRequest;
use App\Http\Requests\Acl\Hospital\EditRequest;
use App\Http\Requests\Acl\Hospital\StatusEditRequest;
use Illuminate\Http\Request;


interface HospitalInterface{
    public function Get_All_Data();
    public function Get_All_Data_Request();
    public function Get_One_Data($id);
    public function Update_Status_One_Data($id);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(StatusEditRequest $request);
    public function Get_List_Data_By_Name($title);
    public function Update_View($id);
    public function Get_One_Data_Translation($id);
    public function Update_Data(EditRequest $request, $id);
    public function Create_Data(CreateRequest $request);
    public function Update_Status_One_Data_Request($id);
}