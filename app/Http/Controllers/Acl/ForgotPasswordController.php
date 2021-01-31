<?php

namespace App\Http\Controllers\Acl;

use App\Http\Requests\Acl\Patient\PasswordRequest;
use App\Repositories\Acl\ForgotPasswordRepository;
use App\Repositories\Acl\PatientRepository;
use App\Repositories\Acl\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ForgotPasswordController extends Controller
{
    private $patientRepository;
    private $userRepository;
    private $forgotpasswordRepository;

    public function __construct(PatientRepository $PatientRepository,UserRepository $UserRepository,ForgotPasswordRepository $ForgotPasswordRepository)
    {
        $this->patientRepository = $PatientRepository;
        $this->userRepository = $UserRepository;
        $this->forgotpasswordRepository = $ForgotPasswordRepository;
    }

    public function check(Request $request)
    {
        change_locale_language($request->language_id);
        $patient = $this->patientRepository->Check_Patient($request);
        if($patient['status_data'] == 0)
        {
            return response(['status' => $patient['status_data'], 'data' => $patient['patient'], 'message' => $patient['message']], $patient['status']);
        }
        $forgot_password = $this->forgotpasswordRepository->Check_User($patient['patient']['id']);
        if (!$forgot_password) {
            $forgot_password = $this->forgotpasswordRepository->Store($patient['patient']['id']);
        }
        return response(['status' => $patient['status_data'], 'data' => ['code' => $forgot_password->code], 'message' => trans('lang.Send_Mail')], $patient['status']);
    }

    public function validate_code(Request $request)
    {
        change_locale_language($request->language_id);
        $patient = $this->patientRepository->Check_Patient($request);
        if($patient['status_data'] == 0)
        {
            return response(['status' => $patient['status_data'], 'data' => $patient['patient'], 'message' => $patient['message']], $patient['status']);
        }
        $forgot_password = $this->forgotpasswordRepository->Check_Code($patient['patient']['id'],$request->code);
        if ($forgot_password) {
            $this->forgotpasswordRepository->Update($forgot_password->id);
            return response(['status' => $patient['status_data'], 'data' => array(), 'message' => trans('lang.Message_Edit')], $patient['status']);
        }
        return response(['status' => 0, 'data' => array(), 'message' => trans('lang.Message_Code_Wong')], $patient['status']);
    }

    public function change_password(PasswordRequest $request)
    {
        change_locale_language($request->language_id);
        $patient = $this->patientRepository->Check_Patient($request->email);
        if($patient['status_data'] == 0)
        {
            return response(['status' => $patient['status_data'], 'data' => $patient['patient'], 'message' => $patient['message']], $patient['status']);
        }
        $this->userRepository->Resat_Password($patient['patient']['id']);
        return response(['status' => $patient['status_data'], 'data' => array(), 'message' => trans('lang.Message_Edit')], $patient['status']);
    }
}
