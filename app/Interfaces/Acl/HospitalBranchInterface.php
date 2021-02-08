<?php

namespace App\Interfaces\Acl;

use App\Http\Requests\Acl\Hospital_Branch\CreateRequest;
use App\Http\Requests\Acl\Hospital_Branch\EditRequest;

interface HospitalBranchInterface{
    public function Get_All_Data();
    public function Get_One_Data($id);
    public function Get_One_Data_Translation($id);
    public function Update_Data(EditRequest $request, $id);
    public function Create_Data(CreateRequest $request);
}