<?php

namespace App\Interfaces\Core_Data;

use App\Http\Requests\Core_Data\Sub_Specialty\CreateRequest;
use App\Http\Requests\Core_Data\Sub_Specialty\EditRequest;
use App\Http\Requests\Core_Data\Sub_Specialty\StatusEditRequest;
use Illuminate\Http\Request;


interface SubSpecialtyInterface{

    public function Get_All_Data();
    public function Create_Data(CreateRequest $request);
    public function Get_One_Data($id);
    public function Get_One_Data_Translation($id);
    public function Update_Data(EditRequest $request, $id);
    public function Update_Status_One_Data($id);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Datas(StatusEditRequest $request);
    public function Get_List_Data_For_Specialty($specialty);
}