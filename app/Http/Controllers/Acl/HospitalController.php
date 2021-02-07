<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Hospital\CreateRequest;
use App\Http\Requests\Acl\Hospital\EditRequest;
use App\Http\Requests\Acl\Hospital\StatusEditRequest;
use App\Http\Resources\Acl\HospitalResource;
use App\Repositories\Acl\HospitalRepository;
use App\Repositories\Core_Data\AreaRepository;
use App\Repositories\Core_Data\CityRepository;
use App\Repositories\Core_Data\CompanyInsuranceRepository;
use App\Repositories\Core_Data\CountryRepository;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    private $hospitalRepository;
    private $areaRepository;
    private $countryRepository;
    private $cityRepository;
    private $company_insuranceRepository;

    public function __construct(HospitalRepository $HospitalRepository,CountryRepository $CountryRepository,CityRepository $CityRepository,AreaRepository $AreaRepository,
                                CompanyInsuranceRepository $Company_InsuranceRepository)
    {
        $this->hospitalRepository = $HospitalRepository;
        $this->countryRepository = $CountryRepository;
        $this->cityRepository = $CityRepository;
        $this->areaRepository = $AreaRepository;
        $this->company_insuranceRepository = $Company_InsuranceRepository;
    }

    public function index()
    {
        $datas = $this->hospitalRepository->Get_All_Data();
        return view('admin.acl.hospital.index', compact('datas'));
    }

    public function index_request()
    {
        $datas = $this->hospitalRepository->Get_All_Data_Request();
        return view('admin.acl.hospital.index_request', compact('datas'));
    }

    public function change_status($id)
    {
        $this->hospitalRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->hospitalRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_status_Request($id)
    {
        $this->hospitalRepository->Update_Status_One_Data_Request($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function search_name(Request $request)
    {
        change_locale_language($request->language_id);
        $hospital = $this->hospitalRepository->Get_List_Data_By_Name($request->title);
        return response(['status' => 1, 'data' => ['hospital' => HospitalResource::collection($hospital),
            'paginator' => [
                'total_count' => $hospital->Total(),
                'total_pages' => ceil($hospital->Total() / $hospital->PerPage()),
                'current_page' => $hospital->CurrentPage(),
                'limit' => $hospital->PerPage()]], 'message' => trans('lang.Index')], 206);
    }

    public function show(Request $request)
    {
        change_locale_language($request->language_id);
        $hospital = $this->hospitalRepository->Get_One_Data($request->hospital_id);
        if ($hospital->hospital && $hospital->hospital->status_request == 1) {
            $this->hospitalRepository->Update_View($hospital->hospital->id);
            return response(['status' => 1, 'data' => ['hospital' => new HospitalResource($hospital)], 'message' => trans('lang.Index')], 200);
        }
        return response(['status' => 1, 'data' => ['hospital' => array()], 'message' => trans('lang.Index')], 200);
    }

    public function create()
    {
        $country = $this->countryRepository->Get_List_Data();
        $company_insurance = $this->company_insuranceRepository->Get_List_Data();
        return view('admin.acl.hospital.create',compact('country','company_insurance'));
    }

    public function store(CreateRequest $request)
    {
        $this->hospitalRepository->Create_Data($request);
        return redirect('/admin')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $country = $this->countryRepository->Get_List_Data();
        $data = $this->hospitalRepository->Get_One_Data_Translation($id);
        $city = $this->cityRepository->Get_List_Data_For_Country($data['country_id']);
        $area = $this->areaRepository->Get_List_Data_For_City($data['country_id'],$data['city_id']);
        $company_insurance = $this->company_insuranceRepository->Get_List_Data();
        return view('admin.acl.hospital.edit', compact('data','country','city','area','company_insurance'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->hospitalRepository->Update_Data($request, $id);
        return redirect('/admin')->with('message', trans('lang.Message_Edit'));
    }

    public function show_request($id)
    {
        $data = $this->hospitalRepository->Get_One_Data_Translation($id);
        return view('admin.acl.hospital.show', compact('data'));
    }
}