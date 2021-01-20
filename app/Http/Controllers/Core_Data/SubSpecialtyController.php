<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Sub_Specialty\CreateRequest;
use App\Http\Requests\Core_Data\Sub_Specialty\EditRequest;
use App\Http\Requests\Core_Data\Sub_Specialty\StatusEditRequest;
use App\Repositories\Core_Data\SubSpecialtyRepository;

class SubSpecialtyController extends Controller
{
    private $sub_specialtyRepository;

    public function __construct(SubSpecialtyRepository $Sub_SpecialtyRepository)
    {
        $this->sub_specialtyRepository = $Sub_SpecialtyRepository;
    }

    public function index()
    {
        $datas = $this->sub_specialtyRepository->Get_All_Data();
        return view('admin.core_data.sub_specialty.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.sub_specialty.create');
    }

    public function store(CreateRequest $request)
    {
        $this->sub_specialtyRepository->Create_Data($request);

        return redirect('/admin/sub_specialty/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->sub_specialtyRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.sub_specialty.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->sub_specialtyRepository->Update_Data($request, $id);
        return redirect('/admin/sub_specialty/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->sub_specialtyRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->sub_specialtyRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

}
