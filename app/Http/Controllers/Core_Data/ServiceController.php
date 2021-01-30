<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Service\CreateRequest;
use App\Http\Requests\Core_Data\Service\EditRequest;
use App\Http\Requests\Core_Data\Service\StatusEditRequest;
use App\Http\Resources\Core_Data\ServiceResource;
use App\Repositories\Core_Data\ServiceCategoryRepository;
use App\Repositories\Core_Data\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceRepository;
    private $service_categoryRepository;

    public function __construct(ServiceRepository $ServiceRepository,ServiceCategoryRepository $Service_CategoryRepository)
    {
        $this->serviceRepository = $ServiceRepository;
        $this->service_categoryRepository = $Service_CategoryRepository;
    }

    public function index()
    {
        $datas = $this->serviceRepository->Get_All_Data();
        return view('admin.core_data.service.index',compact('datas'));
    }

    public function create()
    {
        $service_category = $this->service_categoryRepository->Get_List_Data();
        return view('admin.core_data.service.create',compact('service_category'));
    }

    public function store(CreateRequest $request)
    {
        $this->serviceRepository->Create_Data($request);

        return redirect('/admin/service/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $service_category = $this->service_categoryRepository->Get_List_Data();
        $data = $this->serviceRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.service.edit',compact('data','service_category'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->serviceRepository->Update_Data($request, $id);
        return redirect('/admin/service/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->serviceRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->serviceRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function list_data(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['service'=> ServiceResource::collection($this->serviceRepository->Get_List_Data_For_Service_Category($request->service_category_id))], 'message' => trans('lang.Index')], 206);
    }
}
