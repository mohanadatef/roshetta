<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Area\CreateRequest;
use App\Http\Requests\Core_Data\Area\EditRequest;
use App\Http\Requests\Core_Data\Area\StatusEditRequest;
use App\Http\Resources\Core_Data\AreaResource;
use App\Repositories\Core_Data\AreaRepository;
use App\Repositories\Core_Data\CityRepository;
use App\Repositories\Core_Data\CountryRepository;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    private $areaRepository;
    private $countryRepository;
    private $cityRepository;

    public function __construct(AreaRepository $AreaRepository,CountryRepository $CountryRepository,CityRepository $CityRepository)
    {
        $this->areaRepository = $AreaRepository;
        $this->countryRepository = $CountryRepository;
        $this->cityRepository = $CityRepository;
    }

    public function index()
    {
        $datas = $this->areaRepository->Get_All_Data();
        return view('admin.core_data.area.index',compact('datas'));
    }

    public function create()
    {
        $country = $this->countryRepository->Get_List_Data();
        return view('admin.core_data.area.create',compact('country'));
    }

    public function store(CreateRequest $request)
    {
        $this->areaRepository->Create_Data($request);

        return redirect('/admin/area/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->areaRepository->Get_One_Data_Translation($id);
        $country = $this->countryRepository->Get_List_Data();
        $city = $this->cityRepository->Get_List_Data_For_Country($data['country_id']);
        return view('admin.core_data.area.edit',compact('data','country','city'));
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

    public function list_data(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['area'=> AreaResource::collection($this->areaRepository->Get_List_Data_For_City($request->country_id,$request->city_id))], 'message' => trans('lang.Index')], 206);
    }

    public function Get_List_Area_Json($country,$city)
    {
        return $this->areaRepository->Get_List_Data_For_City($country,$city);
    }

}
