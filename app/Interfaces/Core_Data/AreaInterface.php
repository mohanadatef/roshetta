<?php

namespace App\Interfaces\Core_Data;

use App\Http\Requests\Core_Data\Area\CreateRequest;
use App\Http\Requests\Core_Data\Area\EditRequest;
use App\Http\Requests\Core_Data\Area\StatusEditRequest;
use Illuminate\Http\Request;


interface AreaInterface{

    public function Get_All_Data();
    public function Create_Data(CreateRequest $request);
    public function Get_One_Data($id);
    public function Get_One_Data_Translation($id);
    public function Update_Data(EditRequest $request, $id);
    public function Update_Status_One_Data($id);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Datas(StatusEditRequest $request);
    public function Get_List_Data_For_City($country,$city);
}