<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Scientific_Degree\CreateRequest;
use App\Http\Requests\Core_Data\Scientific_Degree\EditRequest;
use App\Http\Requests\Core_Data\Scientific_Degree\StatusEditRequest;
use App\Repositories\Core_Data\ScientificDegreeRepository;

class ScientificDegreeController extends Controller
{
    private $scientific_degreeRepository;

    public function __construct(ScientificDegreeRepository $Scientific_DegreeRepository)
    {
        $this->scientific_degreeRepository = $Scientific_DegreeRepository;
    }

    public function index()
    {
        $datas = $this->scientific_degreeRepository->Get_All_Data();
        return view('admin.core_data.scientific_degree.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.scientific_degree.create');
    }

    public function store(CreateRequest $request)
    {
        $this->scientific_degreeRepository->Create_Data($request);

        return redirect('/admin/scientific_degree/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->scientific_degreeRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.scientific_degree.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->scientific_degreeRepository->Update_Data($request, $id);
        return redirect('/admin/scientific_degree/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->scientific_degreeRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->scientific_degreeRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

}
