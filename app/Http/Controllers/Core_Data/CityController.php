<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\City\CreateRequest;
use App\Http\Requests\Core_Data\City\EditRequest;
use App\Http\Requests\Core_Data\City\StatusEditRequest;
use App\Http\Resources\Core_Data\CityResource;
use App\Repositories\Core_Data\CityRepository;
use App\Repositories\Core_Data\CountryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    private $cityRepository;
    private $countryRepository;

    public function __construct(CityRepository $CityRepository,CountryRepository $CountryRepository)
    {
        $this->cityRepository = $CityRepository;
        $this->countryRepository = $CountryRepository;
    }

    public function index()
    {
        $datas = $this->cityRepository->Get_All_Data();
        return view('admin.core_data.city.index',compact('datas'));
    }

    public function create()
    {
        $country = $this->countryRepository->Get_List_Data();
        return view('admin.core_data.city.create',compact('country'));
    }

    public function store(CreateRequest $request)
    {
        $this->cityRepository->Create_Data($request);

        return redirect('/admin/city/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $country = $this->countryRepository->Get_List_Data();
        $data = $this->cityRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.city.edit',compact('data','country'));
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

    public function Get_List_City_Json($country)
    {
        return $this->cityRepository->Get_List_Data_For_Country($country);
    }

    public function list_data(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['city'=> CityResource::collection($this->cityRepository->Get_List_Data_For_Country($request->country_id))], 'message' => trans('lang.Index')], 206);
    }
}
