<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Patient\CreateRequest;
use App\Http\Requests\Acl\Patient\StatusEditRequest;
use App\Repositories\Acl\PatientRepository;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $patientRepository;

    public function __construct(PatientRepository $PatientRepository)
    {
        $this->middleware('auth:api', ['except' => ['store','index','login']]);
        $this->patientRepository = $PatientRepository;
    }

    public function index()
    {
        $datas= $this->patientRepository->Get_All_Data();
        return view('admin.acl.patient.index',compact('datas'));
    }

    public function store(CreateRequest $request)
    {
       $patient= $this->patientRepository->Create_Data($request);
        return response(['status' => 1, 'data' => ['patient'=>$patient], 'message' => trans('lang.Message_Store')], 200);
    }

    public function change_status($id)
    {
        $this->patientRepository->Update_Status_One_Data($id);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function change_many_status(StatusEditRequest $request)
    {
        $this->patientRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', trans('lang.Message_Status'));
    }

    public function login(Request $request)
    {
        $patient = $this->patientRepository->Login($request);
        return response(['status' => $patient['status_data'], 'data' => ['patient' => $patient['patient']], 'message' => $patient['message']], $patient['status']);
    }

    public function logout(Request $request)
    {
        $this->patientRepository->Logout($request->id);
        change_locale_language($request->language_id);
        return response()->json(['status' => 1, 'data' => array(), 'message' => trans('lang.Message_Logout')]);
    }
}