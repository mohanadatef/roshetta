<?php

namespace App\Repositories\Acl;

use App\Http\Requests\Acl\Doctor\CreateRequest;
use App\Http\Requests\Acl\Doctor\EditRequest;
use App\Interfaces\Acl\DoctorDetailInterface;
use App\Models\Acl\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorDetailRepository implements DoctorDetailInterface
{
    protected $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function Get_One_Data($id)
    {
        return $this->doctor->find($id);
    }

    public function Update_Status_One_Data($id)
    {
        $doctor = $this->Get_One_Data($id);
        $doctor->status_request == 1 ? $doctor->status_request = '0' : $doctor->status_request = '1';
        $doctor->update();
    }

    public function Update_View($id)
    {
       $doctor= $this->Get_One_Data($id);
        $doctor->count_view=$doctor->count_view+1;
        $doctor->update();
    }

    public function Get_One_Data_Translation($id)
    {
        $doctor = $this->doctor->find($id)->translations;
        return $doctor ? array_merge($this->doctor->with('sub_specialty','specialty','scientific_degree','company_insurance')->find($id)->toarray(), $doctor) : $this->doctor->with('sub_specialty','specialty','scientific_degree','company_insurance')->find($id);
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['user_id']=Auth::user()->id;
        $data['status_request']=0;
        $data['count_view']=0;
        $data['valuation']=0;
        $data['code_number']="D-".time().date("Ymd");
        $imagelicenseName = $request->image_license->getClientOriginalname() . '-' . time() . '-image.' . Request()->image_license->getClientOriginalExtension();
        Request()->image_license->move(public_path('images/user/doctor'), $imagelicenseName);
        $data['image_license'] = $imagelicenseName;
        $image_universityName = $request->image_university->getClientOriginalname() . '-' . time() . '-image_university.' . Request()->image_university->getClientOriginalExtension();
        Request()->image_university->move(public_path('images/user/doctor'), $image_universityName);
        $data['image_university'] = $image_universityName;
        return $this->doctor->create(array_merge($request->all(), $data))->sub_specialty()->sync((array)$request->sub_specialty)->company_insurance()->sync((array)$request->company_insurance);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $data['status_request']=0;
        if($request->image_license)
        {
        $imagelicenseName = $request->image_license->getClientOriginalname() . '-' . time() . '-image.' . Request()->image_license->getClientOriginalExtension();
        Request()->image_license->move(public_path('images/user/doctor'), $imagelicenseName);
        $data['image_license'] = $imagelicenseName;
        }
        if($request->image_university)
        {
        $image_universityName = $request->image_university->getClientOriginalname() . '-' . time() . '-image_university.' . Request()->image_university->getClientOriginalExtension();
        Request()->image_university->move(public_path('images/user/doctor'), $image_universityName);
        $data['image_university'] = $image_universityName;
        }
        $doctor=$this->Get_One_Data($id);
        $doctor->sub_specialty()->sync((array)$request->sub_specialty);
        $doctor->company_insurance()->sync((array)$request->company_insurance);
        $doctor->update(array_merge($request->all(), $data));
    }

    public function Get_One_By_Code($code)
    {
        return $this->doctor->where('code_number',$code)->select('id')->first();
    }
}
