<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Country\CreateRequest;
use App\Http\Requests\Core_Data\Country\EditRequest;
use App\Http\Requests\Core_Data\Country\StatusEditRequest;
use App\Http\Resources\Core_Data\CountryResource;
use App\Repositories\Core_Data\CountryRepository;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $countryRepository;

    public function __construct(CountryRepository $CountryRepository)
    {
        $this->countryRepository = $CountryRepository;
    }

    public function index()
    {
        $datas = $this->countryRepository->Get_All_Data();
        return view('admin.core_data.country.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.core_data.country.create');
    }

    public function store(CreateRequest $request)
    {
        $this->countryRepository->Create_Data($request);

        return redirect('/admin/country/index')->with('message', trans('lang.Message_Store'));
    }

    public function edit($id)
    {
        $data = $this->countryRepository->Get_One_Data_Translation($id);
        return view('admin.core_data.country.edit',compact('data'));
    }

    public function update(EditRequest $request, $id)
    {
        $this->countryRepository->Update_Data($request, $id);
        return redirect('/admin/country/index')->with('message', trans('lang.Message_Edit'));
    }

    public function change_status($id)
    {
        $this->countryRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->countryRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function list_data(Request $request)
    {
        change_locale_language($request->language_id);
        return response(['status' => 1, 'data' => ['country'=> CountryResource::collection($this->countryRepository->Get_List_Data())], 'message' => trans('lang.Index')], 206);
    }
}
