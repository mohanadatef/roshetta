<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Specialty\CreateRequest;
use App\Http\Requests\Core_Data\Specialty\EditRequest;
use App\Http\Requests\Core_Data\Specialty\StatusEditRequest;
use App\Repositories\Core_Data\SpecialtyRepository;

class SpecialtyController extends Controller
{
    private $specialtyRepository;

    public function __construct(SpecialtyRepository $SpecialtyRepository)
    {
        $this->specialtyRepository = $SpecialtyRepository;
    }

    public function index()
    {
        $datas = $this->specialtyRepository->Get_All_Data();
        return view('admin.core_data.specialty.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.specialty.create');
    }

    public function store(CreateRequest $request)
    {
        $this->specialtyRepository->Create_Data($request);

        return redirect('/admin/specialty/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->specialtyRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.specialty.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->specialtyRepository->Update_Data($request, $id);
        return redirect('/admin/specialty/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->specialtyRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->specialtyRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

}
