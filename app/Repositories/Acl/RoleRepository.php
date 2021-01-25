<?php

namespace App\Repositories\Acl;


use App\Http\Requests\Acl\Role\CreateRequest;
use App\Http\Requests\Acl\Role\EditRequest;
use App\Interfaces\Acl\RoleInterface;
use App\Models\ACL\Permission_role;
use App\Models\Acl\Role;

class RoleRepository implements RoleInterface
{

    protected $role;
    protected $permission_role;

    public function __construct(Role $role,Permission_role $permission_role)
    {
        $this->role = $role;
        $this->permission_role = $permission_role;
    }

    public function Get_All_Data()
    {
        return $this->role->all();
    }

    public function Create_Data(CreateRequest $request)
    {
        $this->role->create($request->all());
    }

    public function Get_One_Data_Translation($id)
    {
       $role =  $this->role->find($id)->translations;
       if($role)
       {
        return array_merge($this->role->find($id)->toarray(),$role);
       }
       else
       {
           return $this->role->find($id);
       }
    }

    public function Get_One_Data($id)
    {
        return $this->role->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $role = $this->Get_One_Data($id);
        $role->permission()->sync((array)$request->input('permission'));
        $role->update($request->all());
    }

    public function Get_List_Data()
    {
        return $this->role->select('title', 'id')->get();
    }

    public function Get_Permission_For_Role($id)
    {
        return $this->permission_role->where('role_id',$id)->get();
    }
}