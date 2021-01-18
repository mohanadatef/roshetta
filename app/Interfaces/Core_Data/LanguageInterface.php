<?php

namespace App\Interfaces\Core_Data;

use App\Http\Requests\Admin\Core_Data\Language\CreateRequest;
use App\Http\Requests\Admin\Core_Data\Language\EditRequest;
use App\Http\Requests\Admin\Core_Data\Language\StatusEditRequest;
use Illuminate\Http\Request;


interface LanguageInterface{

    public function Get_All_Data();
    public function Create_Data(CreateRequest $request);
    public function Get_One_Data($id);
    public function Update_Data(EditRequest $request, $id);
    public function Update_Status_One_Data($id);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Datas(StatusEditRequest $request);
}