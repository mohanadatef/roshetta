<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\User\CreateRequest;
use App\Http\Requests\Acl\User\EditRequest;
use App\Http\Requests\Acl\User\StatusEditRequest;
use App\Http\Requests\Acl\User\PasswordRequest;
use App\Repositories\Acl\RoleRepository;
use App\Repositories\Acl\UserRepository;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $UserRepository,RoleRepository $RoleRepository)
    {
        $this->userRepository = $UserRepository;
        $this->roleRepository = $RoleRepository;
    }

    public function index()
    {
        $datas = $this->userRepository->Get_All_Data();
        return view('admin.acl.user.index',compact('datas'));
    }

    public function create()
    {
        $role = $this->roleRepository->Get_List_Data();
        return view('admin.acl.user.create',compact('role'));
    }

    public function store(CreateRequest $request)
    {
        $this->userRepository->Create_Data($request);
        return redirect('/admin/user/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $role = $this->roleRepository->Get_List_Data();
        $data = $this->userRepository->Get_One_Data_Translation($id);
        return view('admin.acl.user.edit',compact('data','role'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->userRepository->Update_Data($request, $id);
        return redirect('/admin/user/index')->with('message', trans('lang.Message_Edit'));
    }

    public function password($id)
    {
        $data = $this->userRepository->Get_One_Data($id);
        return view('admin.acl.user.password',compact('data'));
    }

    public function change_password(PasswordRequest $request, $id)
    {
        $this->userRepository->Update_Password_Data($request, $id);
        return redirect('/admin/user/index')->with('message',trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->userRepository->Update_Status_One_Data($id);
       return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->userRepository->Update_Status_Data($request);
       return redirect()->back()->with('message', trans('lang.Message_Status'));
    }
}