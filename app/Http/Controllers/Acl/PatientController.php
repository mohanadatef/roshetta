<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\Patient\CreateRequest;
use App\Repositories\Acl\PatientRepository;

class PatientController extends Controller
{
    private $patientRepository;

    public function __construct(PatientRepository $PatientRepository)
    {
        $this->middleware('auth:api', ['except' => ['store']]);
        $this->patientRepository = $PatientRepository;
    }

    public function store(CreateRequest $request)
    {
       $patient= $this->patientRepository->Create_Data($request);
        return response(['status' => 1, 'data' => ['patient'=>$patient], 'message' => trans('lang.Message_Store')], 200);
    }

}