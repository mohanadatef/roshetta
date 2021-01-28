<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Company_Insurance\CreateRequest;
use App\Http\Requests\Core_Data\Company_Insurance\EditRequest;
use App\Http\Requests\Core_Data\Company_Insurance\StatusEditRequest;
use App\Http\Resources\Core_Data\CompanyInsuranceResource;
use App\Repositories\Core_Data\CompanyInsuranceRepository;
use Illuminate\Http\Request;

class CompanyInsuranceController extends Controller
{
    private $company_insuranceRepository;

    public function __construct(CompanyInsuranceRepository $CompanyInsuranceRepository)
    {
        $this->company_insuranceRepository = $CompanyInsuranceRepository;
    }

    public function index()
    {
        $datas = $this->company_insuranceRepository->Get_All_Data();
        return view('admin.core_data.company_insurance.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.company_insurance.create');
    }

    public function store(CreateRequest $request)
    {
        $this->company_insuranceRepository->Create_Data($request);
        return redirect('/admin/company_insurance/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->company_insuranceRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.company_insurance.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->company_insuranceRepository->Update_Data($request, $id);
        return redirect('/admin/company_insurance/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->company_insuranceRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->company_insuranceRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function list_data(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['company_insurance'=> CompanyInsuranceResource::collection($this->company_insuranceRepository->Get_List_Data())], 'message' => trans('lang.Index')], 206);
    }
}
