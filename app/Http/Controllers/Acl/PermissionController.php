<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Permission\CreateRequest;
use App\Http\Requests\Acl\Permission\EditRequest;
use App\Repositories\Acl\PermissionRepository;

class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(PermissionRepository $PermissionRepository)
    {
        $this->permissionRepository = $PermissionRepository;
    }

    public function index()
    {
        $datas = $this->permissionRepository->Get_All_Data();
        return view('admin.acl.permission.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.acl.permission.create');
    }

    public function store(CreateRequest $request)
    {
        $this->permissionRepository->Create_Data($request);

        return redirect('/admin/permission/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->permissionRepository->Get_One_Data_Translation($id);
        return view('admin.acl.permission.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->permissionRepository->Update_Data($request, $id);
        return redirect('/admin/permission/index')->with('message', trans('lang.Message_Edit'));
    }
}
