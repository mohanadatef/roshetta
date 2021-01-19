<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Area\CreateRequest;
use App\Http\Requests\Core_Data\Area\EditRequest;
use App\Http\Requests\Core_Data\Area\StatusEditRequest;
use App\Repositories\Core_Data\AreaRepository;

class AreaController extends Controller
{
    private $areaRepository;

    public function __construct(AreaRepository $AreaRepository)
    {
        $this->areaRepository = $AreaRepository;
    }

    public function index()
    {
        $datas = $this->areaRepository->Get_All_Data();
        return view('admin.core_data.area.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.area.create');
    }

    public function store(CreateRequest $request)
    {
        $this->areaRepository->Create_Data($request);

        return redirect('/admin/area/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->areaRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.area.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->areaRepository->Update_Data($request, $id);
        return redirect('/admin/area/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->areaRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->areaRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }
}
