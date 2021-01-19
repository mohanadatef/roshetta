<?php

namespace App\Interfaces\Setting;

use App\Http\Requests\Setting\Privacy\CreateRequest;
use App\Http\Requests\Setting\Privacy\EditRequest;

interface PrivacyInterface{

    public function Get_All_Data();
    public function Create_Data(CreateRequest $request);
    public function Get_One_Data_Translation($id);
    public function Get_One_Data($id);
    public function Update_Data(EditRequest  $request, $id);
}