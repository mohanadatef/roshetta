<?php

namespace App\Http\Controllers\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acl\User\CreateRequest;
use App\Http\Requests\Acl\User\EditRequest;
use App\Repositories\Acl\UserRepository;

class PatientController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->middleware('auth:api', ['except' => ['store']]);
        $this->userRepository = $UserRepository;
    }

    public function store(CreateRequest $request)
    {
       $patient= $this->userRepository->Create_Data($request);
        return response(['status' => 1, 'data' => ['patient'=>$patient], 'message' => trans('lang.Message_Store')], 200);
    }

    public function update(EditRequest $request, $id)
    {
       $patient = $this->userRepository->Update_Data($request, $id);
        return response(['status' => 1, 'data' => ['patient'=>$patient], 'message' => trans('lang.Message_Edit')], 206);
    }

}