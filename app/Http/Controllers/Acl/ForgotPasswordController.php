<?php

namespace App\Http\Controllers\Acl;

use App\Http\Requests\Acl\User\PasswordRequest;
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

    public function index()
    {
        return view('auth.forgot_password.check');
    }

    public function check(Request $request)
    {
        $request->language_id ? change_locale_language($request->language_id) : true;
        $user = $this->userRepository->Check_User($request->email);
        if($user['status_data'] == 0)
        {
            return $request->language_id ? response(['status' => $user['status_data'], 'data' => $user['user'], 'message' => $user['message']], $user['status']) : redirect()->back()->with('message_fales',$user['message']);
        }
        $forgot_password = $this->forgotpasswordRepository->Check_User($user['user']['id']);
        if (!$forgot_password) {
            $this->forgotpasswordRepository->Store($user['user']['id']);
        }
        return $request->language_id ? response(['status' => $user['status_data'], 'data' => array(), 'message' => trans('lang.Send_Mail')], $user['status']) : view('auth.forgot_password.validate_code');
    }

    public function validate_code(Request $request)
    {
        $request->language_id ? change_locale_language($request->language_id) : true;
        $user = $this->userRepository->Check_User($request->email);
        if($user['status_data'] == 0)
        {
            return $request->language_id ?  response(['status' => $user['status_data'], 'data' => $user['user'], 'message' => $user['message']], $user['status']) : redirect()->back()->with('message_fales',$user['message']);
        }
        $forgot_password = $this->forgotpasswordRepository->Check_Code($user['user']['id'],$request->code);
        if ($forgot_password) {
            $this->forgotpasswordRepository->Update($forgot_password->id);
            return $request->language_id ? response(['status' => $user['status_data'], 'data' => array(), 'message' => trans('lang.Message_Edit')], $user['status']) : view('auth.forgot_password.change_password');
        }
        return $request->language_id ? response(['status' => 0, 'data' => array(), 'message' => trans('lang.Message_Code_Wong')], $user['status']) : redirect()->back()->with('message_fales',trans('lang.Message_Code_Wong'));
    }

    public function change_password(PasswordRequest $request)
    {
        $request->language_id ? change_locale_language($request->language_id) : true;
        $user = $this->userRepository->Check_User($request->email);
        if($user['status_data'] == 0)
        {
            return $request->language_id ?  response(['status' => $user['status_data'], 'data' => $user['user'], 'message' => $user['message']], $user['status']) : view('auth.forgot_password.change_password')->with('message_fales',$user['message']);
        }
        $this->userRepository->Update_Password_Data($request,$user['user']['id']);
        return $request->language_id ? response(['status' => $user['status_data'], 'data' => array(), 'message' => trans('lang.Message_Edit')], $user['status']) : view('auth.login')->with('message',trans('lang.Message_Edit'));
    }
}
