<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Hospital_Branch\CreateRequest;
use App\Http\Requests\Acl\Hospital_Branch\EditRequest;
use App\Repositories\Acl\HospitalBranchRepository;
use App\Repositories\Core_Data\AreaRepository;
use App\Repositories\Core_Data\CityRepository;
use App\Repositories\Core_Data\CountryRepository;

class HospitalBranchController extends Controller
{
    private $hospital_branchRepository;
    private $areaRepository;
    private $countryRepository;
    private $cityRepository;

    public function __construct(HospitalBranchRepository $HospitalBranchRepository,CountryRepository $CountryRepository,CityRepository $CityRepository,AreaRepository $AreaRepository)
    {
        $this->hospital_branchRepository = $HospitalBranchRepository;
        $this->countryRepository = $CountryRepository;
        $this->cityRepository = $CityRepository;
        $this->areaRepository = $AreaRepository;
    }

    public function index()
    {
        $datas = $this->hospital_branchRepository->Get_All_Data();
        return view('admin.acl.hospital.hospital_branch.index', compact('datas'));
    }

    public function create()
    {
        $country = $this->countryRepository->Get_List_Data();
        return view('admin.acl.hospital.hospital_branch.create',compact('country'));
    }

    public function store(CreateRequest $request)
    {
        $this->hospital_branchRepository->Create_Data($request);
        return redirect('/admin/hospital/branch/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $country = $this->countryRepository->Get_List_Data();
        $data = $this->hospital_branchRepository->Get_One_Data_Translation($id);
        $city = $this->cityRepository->Get_List_Data_For_Country($data['country_id']);
        $area = $this->areaRepository->Get_List_Data_For_City($data['country_id'],$data['city_id']);
        return view('admin.acl.hospital.hospital_branch.edit', compact('data','country','city','area'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->hospital_branchRepository->Update_Data($request, $id);
        return redirect('/admin/hospital/branch/index')->with('message', trans('lang.Message_Edit'));
    }
}