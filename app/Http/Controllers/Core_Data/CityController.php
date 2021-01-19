<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\City\CreateRequest;
use App\Http\Requests\Core_Data\City\EditRequest;
use App\Http\Requests\Core_Data\City\StatusEditRequest;
use App\Repositories\Core_Data\CityRepository;

class CityController extends Controller
{
    private $cityRepository;

    public function __construct(CityRepository $CityRepository)
    {
        $this->cityRepository = $CityRepository;
    }

    public function index()
    {
        $datas = $this->cityRepository->Get_All_Data();
        return view('admin.core_data.city.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.city.create');
    }

    public function store(CreateRequest $request)
    {
        $this->cityRepository->Create_Data($request);

        return redirect('/admin/city/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->cityRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.city.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->cityRepository->Update_Data($request, $id);
        return redirect('/admin/city/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->cityRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->cityRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }
}
