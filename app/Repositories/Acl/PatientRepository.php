<?php

namespace App\Repositories\Acl;


use App\Http\Requests\Acl\Patient\CreateRequest;
use App\Http\Requests\Acl\Patient\EditRequest;
use App\Http\Requests\Acl\Patient\StatusEditRequest;
use App\Interfaces\Acl\PatientInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class PatientRepository implements PatientInterface
{
    protected $patient;

    public function __construct(User $patient)
    {
        $this->patient = $patient;
    }

    public function Get_All_Data()
    {
        return $this->patient->where('role_id', 3)->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $data['status_login'] = 1;
        $data['role_id'] = 1;
        $data['password'] = Hash::make($request->password);
        if ($request->image) {
            $folderPath = public_path('images/user/');
            $image_type = 'png';
            $image_base64 = base64_decode($request->image);
            $imageName = time() . uniqid() . '.' . $image_type;
            $file = $folderPath . $imageName;
            file_put_contents($file, $image_base64);
            $data['image'] = $imageName;
        }
        return $this->patient->create(array_merge($request->all(), $data));
    }

    public function Update_Status_One_Data($id)
    {
        $patient = $this->Get_One_Data($id);
        $patient->status == 1 ? $patient->status = '0' : $patient->status = '1';
        $patient->update();
    }

    public function Get_One_Data($id)
    {
        return $this->patient->where('id', $id)->where('role_id', 3)->first();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->patient->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Data(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $patient) {
            $patient->status == 1 ? $patient->status = '0' : $patient->status = '1';
            $patient->update();
        }
    }

    public function Login(Request $request)
    {
        change_locale_language($request->language_id);
        $patient = $this->patient->where('email', $request->email)->where('role_id', 3)->first();
        if (!$patient) {
            $data['status_data'] = 0;
            $data['status'] = 400;
            $data['message'] = trans('passwords.user');
            $data['patient'] = array();
            return $data;
        }
        if (!Hash::check($request->password, $patient->password)) {
            $data['status_data'] = 0;
            $data['status'] = 400;
            $data['message'] = trans('auth.password');
            $data['patient'] = array();
            return $data;
        }
        if ($patient->status == 0) {
            $data['status_data'] = 0;
            $data['status'] = 400;
            $data['message'] = trans('lang.Message_Support');
            $data['patient'] = array();
            return $data;
        }
        if (!$patient->token) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            $token = JWTAuth::attempt($credentials);
            $patient->token = $token;
            $patient->update();
        }
        $data['status_data'] = 1;
        $data['status'] = 200;
        $data['message'] = trans('lang.Message_Login');
        $data['patient'] = $patient;
        return $data;
    }

    public function Logout($id)
    {
        $patient = $this->Get_One_Data($id);
        $patient->token = null;
        $patient->update();
    }

    public function Update_Data(EditRequest $request)
    {
        if ($request->image) {
            $folderPath = public_path('images/user/');
            $image_type = 'png';
            $image_base64 = base64_decode($request->image);
            $imageName = time() . uniqid() . '.' . $image_type;
            $file = $folderPath . $imageName;
            file_put_contents($file, $image_base64);
            $data['image'] = $imageName;
            return $this->Get_One_Data($request->id)->update(array_merge($request->all(), $data));
        } else return $this->Get_One_Data($request->id)->update($request->all());
    }

    public function Check_Patient($email)
    {
        $patient = User::where('role_id',3)->where('email', $email)->first();
        if (!$patient) {
            $data['status_data'] = 0;
            $data['status'] = 400;
            $data['message'] = trans('passwords.user');
            $data['patient'] = array();
            return $data;
        }
        if ($patient->status == 0) {
            $data['status_data'] = 0;
            $data['status'] = 400;
            $data['message'] = trans('lang.Message_Support');
            $data['patient'] = array();
            return $data;
        }
        $data['status_data'] = 1;
        $data['status'] = 200;
        $data['patient'] = $patient;
        return $data;
    }
}
