<?php

namespace App\Repositories\Acl;

use App\Http\Requests\Acl\Hospital\CreateRequest;
use App\Http\Requests\Acl\Hospital\EditRequest;
use App\Http\Requests\Acl\Hospital\StatusEditRequest;
use App\Interfaces\Acl\HospitalInterface;
use App\Models\Acl\Hospital;
use Illuminate\Http\Request;

class HospitalRepository implements HospitalInterface
{
    protected $hospital;

    public function __construct(Hospital $hospital)
    {
        $this->hospital = $hospital;
    }

    public function Get_All_Data()
    {
        return $this->hospital->where('status_request',1)->get();
    }

    public function Get_All_Data_Request()
    {
        return $this->hospital->where('status_request',0)->get();
    }

    public function Get_One_Data_Translation($id)
    {
        $hospital = $this->hospital->find($id)->translations;
        return $hospital ? array_merge($this->hospital->find($id)->toarray(), $hospital) : $this->hospital->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->hospital->find($id);
    }

    public function Update_Status_One_Data_Request($id)
    {
        $hospital = $this->Get_One_Data($id);
        $hospital->status_request == 1 ? $hospital->status_request = '0' : $hospital->status_request = '1';
        $hospital->update();
    }

    public function Update_Status_One_Data($id)
    {
        $hospital = $this->Get_One_Data($id);
        $hospital->status == 1 ? $hospital->status = '0' : $hospital->status = '1';
        $hospital->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->hospital->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Data(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $hospital) {
            $hospital->status == 1 ? $hospital->status = '0' : $hospital->status = '1';
            $hospital->update();
        }
    }

    public function Get_List_Data_By_Name($title)
    {
        $hospital = [];
        foreach (Language() as $lang) {
            $hospital = array_merge($hospital, $this->hospital->where('status_request',1)->where('title->' . $lang->code, 'like', $title . '%')
               ->orwhere('status_request',1)->where('title->' . $lang->code, 'like', '%' . $title . '%')
                ->orwwhere('status_request',1)->where('title->' . $lang->code, 'like', '%' . $title)
                ->select('id')->get()->toarray());
        }
        return $this->hospital->wherein('id', $hospital)->paginate(25);
    }

    public function Update_View($id)
    {
        $hospital= $this->Get_One_Data($id);
        $hospital->count_view=$hospital->count_view+1;
        $hospital->update();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status_request']=0;
        $data['count_view']=0;
        $data['valuation']=0;
        $imagelicenseName = $request->image_license->getClientOriginalname() . '-' . time() . '-image.' . Request()->image_license->getClientOriginalExtension();
        Request()->image_license->move(public_path('images/user/hospital'), $imagelicenseName);
        $data['image_license'] = $imagelicenseName;
        $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/user/hospital'), $imageName);
        $data['image'] = $imageName;
        $this->hospital->create(array_merge($request->all(), $data))->company_insurance()->sync((array)$request->company_insurance);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $data['status_request']=0;
        if($request->image_license)
        {
            $imagelicenseName = $request->image_license->getClientOriginalname() . '-' . time() . '-image.' . Request()->image_license->getClientOriginalExtension();
            Request()->image_license->move(public_path('images/user/hospital'), $imagelicenseName);
            $data['image_license'] = $imagelicenseName;
        }
        if($request->image)
        {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/user/hospital'), $imageName);
            $data['image'] = $imageName;
        }
        $hospital=$this->Get_One_Data($id);
        $hospital->company_insurance()->sync((array)$request->company_insurance);
        $hospital->update(array_merge($request->all(), $data));
    }
}
