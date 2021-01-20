<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Service_Category\CreateRequest;
use App\Http\Requests\Core_Data\Service_Category\EditRequest;
use App\Http\Requests\Core_Data\Service_Category\StatusEditRequest;
use App\Repositories\Core_Data\ServiceCategoryRepository;

class ServiceCategoryController extends Controller
{
    private $service_categoryRepository;

    public function __construct(ServiceCategoryRepository $ServiceCategoryRepository)
    {
        $this->service_categoryRepository = $ServiceCategoryRepository;
    }

    public function index()
    {
        $datas = $this->service_categoryRepository->Get_All_Data();
        return view('admin.core_data.service_category.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.service_category.create');
    }

    public function store(CreateRequest $request)
    {
        $this->service_categoryRepository->Create_Data($request);

        return redirect('/admin/service_category/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->service_categoryRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.service_category.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->service_categoryRepository->Update_Data($request, $id);
        return redirect('/admin/service_category/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->service_categoryRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->service_categoryRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

}
