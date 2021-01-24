<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Role\CreateRequest;
use App\Http\Requests\Acl\Role\EditRequest;
use App\Repositories\Acl\PermissionRepository;
use App\Repositories\Acl\RoleRepository;

class RoleController extends Controller
{
    private $roleRepository;
    private $permissionRepository;

    public function __construct(RoleRepository $RoleRepository,PermissionRepository $PermissionRepository)
    {
        $this->roleRepository = $RoleRepository;
        $this->permissionRepository = $PermissionRepository;
    }

    public function index()
    {
        $datas = $this->roleRepository->Get_All_Data();
        return view('admin.acl.role.index',compact('datas'));
    }

    public function create()
    {
        $permission = $this->permissionRepository->Get_List_Data();
        return view('admin.acl.role.create',compact('permission'));
    }

    public function store(CreateRequest $request)
    {
        $this->roleRepository->Create_Data($request);

        return redirect('/admin/role/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->Get_List_Data();
        $data = $this->roleRepository->Get_One_Data_Translation($id);
        $permission_role = $this->roleRepository->Get_Permission_For_Role($data['id']);
        return view('admin.acl.role.edit',compact('data','permission','permission_role'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->roleRepository->Update_Data($request, $id);
        return redirect('/admin/role/index')->with('message', trans('lang.Message_Edit'));
    }
}
