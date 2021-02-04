<?php

namespace App\Interfaces\Core_Data;

use App\Http\Requests\Core_Data\Scientific_Degree\CreateRequest;
use App\Http\Requests\Core_Data\Scientific_Degree\EditRequest;
use App\Http\Requests\Core_Data\Scientific_Degree\StatusEditRequest;
use Illuminate\Http\Request;


interface ScientificDegreeInterface{

    public function Get_All_Data();
    public function Create_Data(CreateRequest $request);
    public function Get_One_Data($id);
    public function Get_One_Data_Translation($id);
    public function Update_Data(EditRequest $request, $id);
    public function Update_Status_One_Data($id);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Datas(StatusEditRequest $request);
    public function Get_List_Data();
}