<?php

namespace App\Interfaces\Acl;

use App\Http\Requests\Acl\Permission\CreateRequest;
use App\Http\Requests\Acl\Permission\EditRequest;
use App\Http\Requests\Acl\Permission\StatusEditRequest;


interface PermissionInterface{

    public function Get_All_Data();
    public function Create_Data(CreateRequest $request);
    public function Get_One_Data($id);
    public function Get_One_Data_Translation($id);
    public function Update_Data(EditRequest $request, $id);
    public function Get_List_Data();
}