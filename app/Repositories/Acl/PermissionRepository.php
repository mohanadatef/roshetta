<?php

namespace App\Repositories\Acl;


use App\Http\Requests\Acl\Permission\CreateRequest;
use App\Http\Requests\Acl\Permission\EditRequest;
use App\Interfaces\Acl\PermissionInterface;
use App\Models\Acl\Permission;

class PermissionRepository implements PermissionInterface
{

    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function Get_All_Data()
    {
        return $this->permission->all();
    }

    public function Create_Data(CreateRequest $request)
    {
        $this->permission->create($request->all());
    }

    public function Get_One_Data_Translation($id)
    {
       $permission =  $this->permission->find($id)->translations;
       if($permission)
       {
        return array_merge($this->permission->find($id)->toarray(),$permission);
       }
       else
       {
           return $this->permission->find($id);
       }
    }

    public function Get_One_Data($id)
    {
        return $this->permission->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $this->Get_One_Data($id)->update($request->all());
    }

    public function Get_List_Data()
    {
        return $this->permission->select('display_title', 'id')->get();
    }
}
