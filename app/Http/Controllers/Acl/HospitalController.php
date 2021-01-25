<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Hospital\CreateRequest;
use App\Http\Requests\Acl\Hospital\EditRequest;
use App\Http\Requests\Acl\Hospital\StatusEditRequest;
use App\Repositories\Acl\HospitalRepository;

class HospitalController extends Controller
{
    private $hospitalRepository;

    public function __construct(HospitalRepository $HospitalRepository)
    {
        $this->hospitalRepository = $HospitalRepository;
    }

    public function index()
    {
        $datas = $this->hospitalRepository->Get_All_Data();
        return view('admin.acl.hospital.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.acl.hospital.create');
    }

    public function store(CreateRequest $request)
    {
        $this->hospitalRepository->Create_Data($request);
        return redirect('/admin/hospital/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->hospitalRepository->Get_One_Data_Translation($id);
        return view('admin.acl.hospital.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->hospitalRepository->Update_Data($request, $id);
        return redirect('/admin/hospital/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_password(PasswordRequest $request, $id)
    {
        $this->hospitalRepository->Update_Password_Data($request, $id);
        return redirect('/admin/hospital/index')->with('message',trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->hospitalRepository->Update_Status_One_Data($id);
       return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->hospitalRepository->Update_Status_Data($request);
       return redirect()->back()->with('message', trans('lang.Message_Status'));
    }
}