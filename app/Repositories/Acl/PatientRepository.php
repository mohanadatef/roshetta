<?php

namespace App\Repositories\Acl;


use App\Http\Requests\Acl\Patient\CreateRequest;
use App\Http\Requests\Acl\Patient\StatusEditRequest;
use App\Interfaces\Acl\PatientInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientInterface
{
    protected $patient;

    public function __construct(User $patient)
    {
        $this->patient = $patient;
    }

    public function Get_All_Data()
    {
        return $this->patient->where('role_id',3)->get();
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
        if ($patient->status == 1) {
            $patient->status = '0';
        } elseif ($patient->status == 0) {
            $patient->status = '1';
        }
        $patient->update();
    }

    public function Get_One_Data($id)
    {
        return $this->patient->find($id);
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->patient->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Data(StatusEditRequest $request)
    {
        $patients = $this->Get_Many_Data($request);
        foreach ($patients as $patient) {
            if ($patient->status == 1) {
                $patient->status = '0';
            } elseif ($patient->status == 0) {
                $patient->status = '1';
            }
            $patient->update();
        }
    }
}
