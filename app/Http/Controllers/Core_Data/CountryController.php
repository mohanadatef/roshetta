<?php

namespace App\Http\Controllers\Core_Data;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core_Data\Country\CreateRequest;
use App\Http\Requests\Core_Data\Country\EditRequest;
use App\Http\Requests\Core_Data\Country\StatusEditRequest;
use App\Repositories\Core_Data\CountryRepository;
use Illuminate\Support\Facades\DB;

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

    public function Get_List_Country_Json()
    {
        $country = DB::table("countries")
            ->where("status", "=",1)
            ->pluck("title", "id");
        return response()->json($country);
    }
}
