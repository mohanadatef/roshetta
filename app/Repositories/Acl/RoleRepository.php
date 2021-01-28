<?php

namespace App\Repositories\Acl;


use App\Http\Requests\Acl\Role\CreateRequest;
use App\Http\Requests\Acl\Role\EditRequest;
use App\Interfaces\Acl\RoleInterface;
use App\Models\ACL\Permission_role;
use App\Models\Acl\Role;
use Illuminate\Support\Facades\Auth;

class RoleRepository implements RoleInterface
{

    protected $role;
    protected $permission_role;

    public function __construct(Role $role, Permission_role $permission_role)
    {
        $this->role = $role;
        $this->permission_role = $permission_role;
    }

    public function Get_All_Data()
    {
        return Auth::user()->role_id == 1 ? $this->role->all() : $this->role->whereNotIn('id', [1, 3])->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $this->role->create($request->all());
    }

    public function Get_One_Data_Translation($id)
    {
        $role = $this->role->find($id)->translations;
        return $role ? array_merge($this->role->find($id)->toarray(), $role) : $this->role->find($id);
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
        return Auth::user()->role_id == 1 ? $this->role->select('title', 'id')->get() : $this->role->select('title', 'id')->whereNotIn('id', [1, 3])->get();
    }

    public function Get_Permission_For_Role($id)
    {
        return $this->permission_role->where('role_id', $id)->get();
    }
}
