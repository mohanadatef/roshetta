<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Medicine_Category\CreateRequest;
use App\Http\Requests\Core_Data\Medicine_Category\EditRequest;
use App\Http\Requests\Core_Data\Medicine_Category\StatusEditRequest;
use App\Repositories\Core_Data\MedicineCategoryRepository;

class MedicineCategoryController extends Controller
{
    private $medicine_categoryRepository;

    public function __construct(MedicineCategoryRepository $MedicineCategoryRepository)
    {
        $this->medicine_categoryRepository = $MedicineCategoryRepository;
    }

    public function index()
    {
        $datas = $this->medicine_categoryRepository->Get_All_Data();
        return view('admin.core_data.medicine_category.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.medicine_category.create');
    }

    public function store(CreateRequest $request)
    {
        $this->medicine_categoryRepository->Create_Data($request);

        return redirect('/admin/medicine_category/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->medicine_categoryRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.medicine_category.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->medicine_categoryRepository->Update_Data($request, $id);
        return redirect('/admin/medicine_category/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->medicine_categoryRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->medicine_categoryRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

}
