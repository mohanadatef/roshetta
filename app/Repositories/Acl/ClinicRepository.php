<?php

namespace App\Repositories\Acl;

use App\Http\Requests\Acl\Clinic\CreateRequest;
use App\Http\Requests\Acl\Clinic\EditRequest;
use App\Http\Requests\Acl\Clinic\StatusEditRequest;
use App\Interfaces\Acl\ClinicInterface;
use App\Models\Acl\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicRepository implements ClinicInterface
{
    protected $clinic;

    public function __construct(Clinic $clinic)
    {
        $this->clinic = $clinic;
    }

    public function Get_All_Data()
    {
        return $this->clinic->where('status_request', 1)->get();
    }

    public function Get_All_Data_Request()
    {
        return $this->clinic->where('status_request',0)->get();
    }

    public function Get_One_Data($id)
    {
        return $this->clinic->find($id);
    }

    public function Update_Status_One_Data($id)
    {
        $clinic = $this->Get_One_Data($id);
        $clinic->status == 1 ? $clinic->status = '0' : $clinic->status = '1';
        $clinic->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->clinic->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Data(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $clinic) {
            $clinic->status == 1 ? $clinic->status = '0' : $clinic->status = '1';
            $clinic->update();
        }
    }

    public function Get_List_Data_By_Name($title)
    {
        $clinic = [];
        foreach (Language() as $lang) {
            $clinic = array_merge($clinic, $this->clinic->where('status_request',1)->where('title->' . $lang->code, 'like', $title . '%')
                ->orwhere('status_request',1)->where('title->' . $lang->code, 'like', '%' . $title . '%')
                ->orwhere('status_request',1)->where('title->' . $lang->code, 'like', '%' . $title)
                ->select('id')->get()->toarray());
        }
        return $this->clinic->wherein('id', $clinic)->paginate(25);
    }

    public function Update_Status_One_Data_Request($id)
    {
        $clinic = $this->Get_One_Data($id);
        $clinic->status_request == 1 ? $clinic->status_request = '0' : $clinic->status_request = '1';
        $clinic->update();
    }

    public function Update_View($id)
    {
        $clinic= $this->Get_One_Data($id);
        $clinic->count_view=$clinic->count_view+1;
        $clinic->update();
    }

    public function Get_One_Data_Translation($id)
    {
        $clinic = $this->clinic->find($id)->translations;
        return $clinic ? array_merge($this->clinic->with('company_insurance')->find($id)->toarray(), $clinic) : $this->clinic->with('company_insurance')->find($id);
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['user_id']=Auth::user()->id;
        $data['status_request']=0;
        $data['count_view']=0;
        $data['valuation']=0;
        $imagelicenseName = $request->image_license->getClientOriginalname() . '-' . time() . '-image.' . Request()->image_license->getClientOriginalExtension();
        Request()->image_license->move(public_path('images/clinic'), $imagelicenseName);
        $data['image_license'] = $imagelicenseName;
        $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/clinic'), $imageName);
        $data['image'] = $imageName;
        return $this->clinic->create(array_merge($request->all(),$data))->company_insurance()->sync((array)$request->company_insurance);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $data['status_request']=0;
        if($request->image_license)
        {
            $imagelicenseName = $request->image_license->getClientOriginalname() . '-' . time() . '-image.' . Request()->image_license->getClientOriginalExtension();
            Request()->image_license->move(public_path('images/clinic'), $imagelicenseName);
            $data['image_license'] = $imagelicenseName;
        }
        if($request->image)
        {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/clinic'), $imageName);
            $data['image'] = $imageName;
        }
        $clinic=$this->Get_One_Data($id);
        $clinic->company_insurance()->sync((array)$request->company_insurance);
        $clinic->update(array_merge($request->all(), $data));
    }
}
