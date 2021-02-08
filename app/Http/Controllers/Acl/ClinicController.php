<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Clinic\CreateRequest;
use App\Http\Requests\Acl\Clinic\EditRequest;
use App\Http\Requests\Acl\Clinic\StatusEditRequest;
use App\Http\Resources\Acl\ClinicResource;
use App\Repositories\Acl\ClinicRepository;
use App\Repositories\Core_Data\AreaRepository;
use App\Repositories\Core_Data\CityRepository;
use App\Repositories\Core_Data\CompanyInsuranceRepository;
use App\Repositories\Core_Data\CountryRepository;
use App\Repositories\Core_Data\SpecialtyRepository;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    private $clinicRepository;
    private $areaRepository;
    private $countryRepository;
    private $cityRepository;
    private $company_insuranceRepository;
    private $specialtyRepository;

    public function __construct(ClinicRepository $ClinicRepository,CountryRepository $CountryRepository,CityRepository $CityRepository,AreaRepository $AreaRepository,
                                CompanyInsuranceRepository $Company_InsuranceRepository,SpecialtyRepository $SpecialtyRepository)
    {
        $this->clinicRepository = $ClinicRepository;
        $this->countryRepository = $CountryRepository;
        $this->cityRepository = $CityRepository;
        $this->areaRepository = $AreaRepository;
        $this->company_insuranceRepository = $Company_InsuranceRepository;
        $this->specialtyRepository = $SpecialtyRepository;
    }

    public function index()
    {
        $datas = $this->clinicRepository->Get_All_Data();
        return view('admin.acl.clinic.index', compact('datas'));
    }

    public function index_request()
    {
        $datas = $this->clinicRepository->Get_All_Data_Request();
        return view('admin.acl.clinic.index_request', compact('datas'));
    }

    public function change_status($id)
    {
        $this->clinicRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->clinicRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_status_Request($id)
    {
        $this->clinicRepository->Update_Status_One_Data_Request($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function search_name(Request $request)
    {
        change_locale_language($request->language_id);
        $clinic = $this->clinicRepository->Get_List_Data_By_Name($request->title);
        return response(['status' => 1, 'data' => ['clinic' => ClinicResource::collection($clinic),
            'paginator' => [
                'total_count' => $clinic->Total(),
                'total_pages' => ceil($clinic->Total() / $clinic->PerPage()),
                'current_page' => $clinic->CurrentPage(),
                'limit' => $clinic->PerPage()]], 'message' => trans('lang.Index')], 206);
    }

    public function show(Request $request)
    {
        change_locale_language($request->language_id);
        $clinic = $this->clinicRepository->Get_One_Data($request->clinic_id);
        if ($clinic->clinic && $clinic->clinic->status_request == 1) {
            $this->clinicRepository->Update_View($clinic->clinic->id);
            return response(['status' => 1, 'data' => ['clinic' => new ClinicResource($clinic)], 'message' => trans('lang.Index')], 200);
        }
        return response(['status' => 1, 'data' => ['clinic' => array()], 'message' => trans('lang.Index')], 200);
    }

    public function create()
    {
        $country = $this->countryRepository->Get_List_Data();
        $specialty=$this->specialtyRepository->Get_List_Data();
        $company_insurance = $this->company_insuranceRepository->Get_List_Data();
        return view('admin.acl.clinic.create',compact('country','company_insurance','specialty'));
    }

    public function store(CreateRequest $request)
    {
        $this->clinicRepository->Create_Data($request);
        return redirect('/admin')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $country = $this->countryRepository->Get_List_Data();
        $data = $this->clinicRepository->Get_One_Data_Translation($id);
        $city = $this->cityRepository->Get_List_Data_For_Country($data['country_id']);
        $area = $this->areaRepository->Get_List_Data_For_City($data['country_id'],$data['city_id']);
        $company_insurance = $this->company_insuranceRepository->Get_List_Data();
        $specialty=$this->specialtyRepository->Get_List_Data();
        return view('admin.acl.clinic.edit', compact('data','country','city','area','company_insurance','specialty'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->clinicRepository->Update_Data($request, $id);
        return redirect('/admin')->with('message', trans('lang.Message_Edit'));
    }

    public function show_request($id)
    {
        $country = $this->countryRepository->Get_List_Data();
        $data = $this->clinicRepository->Get_One_Data_Translation($id);
        $city = $this->cityRepository->Get_List_Data_For_Country($data['country_id']);
        $area = $this->areaRepository->Get_List_Data_For_City($data['country_id'],$data['city_id']);
        $company_insurance = $this->company_insuranceRepository->Get_List_Data();
        return view('admin.acl.clinic.show',compact('data','country','city','area','company_insurance'));
    }
}