<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Doctor\CreateRequest;
use App\Http\Requests\Acl\Doctor\EditRequest;
use App\Http\Requests\Acl\Doctor\StatusEditRequest;
use App\Http\Resources\Acl\DoctorResource;
use App\Repositories\Acl\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorRepository;

    public function __construct(DoctorRepository $DoctorRepository)
    {
        $this->doctorRepository = $DoctorRepository;
    }

    public function index()
    {
        $datas= $this->doctorRepository->Get_All_Data();
        return view('admin.acl.doctor.index',compact('datas'));
    }

    public function store(CreateRequest $request)
    {
       $doctor= $this->doctorRepository->Create_Data($request);
        return response(['status' => 1, 'data' => ['doctor'=>$doctor], 'message' => trans('lang.Message_Store')], 200);
    }

    public function change_status($id)
    {
        $this->doctorRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->doctorRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function login(Request $request)
    {
        $doctor = $this->doctorRepository->Login($request);
        return response(['status' => $doctor['status_data'], 'data' => ['doctor' => new DoctorResource($doctor['doctor'])], 'message' => $doctor['message']], $doctor['status']);
    }

    public function logout(Request $request)
    {
        $this->doctorRepository->Logout($request->doctor_id);
        change_locale_language($request->language_id);
        return response()->json(['status' => 1, 'data' => array(), 'message' => trans('lang.Message_Logout')]);
    }

    public function show_profile(Request $request)
    {
        $doctor= $this->doctorRepository->Get_One_Data($request->doctor_id);
        change_locale_language($request->language_id);
        if($doctor)
        return response(['status' => 1, 'data' => ['doctor'=> new DoctorResource($doctor)], 'message' => trans('lang.Profile')], 200);
        else
            return response(['status' => 0, 'data' => array(), 'message' => trans('lang.Null')], 200);
    }

    public function update(EditRequest $request)
    {
        $doctor= $this->doctorRepository->Update_Data($request);
        return response(['status' => 1, 'data' => ['doctor'=> new DoctorResource($doctor)], 'message' => trans('lang.Message_Edit')], 206);
    }
}