<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Specialty\CreateRequest;
use App\Http\Requests\Core_Data\Specialty\EditRequest;
use App\Http\Requests\Core_Data\Specialty\StatusEditRequest;
use App\Interfaces\Core_Data\SpecialtyInterface;
use App\Models\Core_Data\Specialty;
use Illuminate\Http\Request;

class SpecialtyRepository implements SpecialtyInterface
{

    protected $Specialty;

    public function __construct(Specialty $Specialty)
    {
        $this->specialty = $Specialty;
    }

    public function Get_All_Data()
    {
        return $this->specialty->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/Specialty'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->specialty->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        return array_merge($this->specialty->find($id)->toarray(),$this->specialty->find($id)->translations);
    }

    public function Get_One_Data($id)
    {
        return $this->specialty->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $specialty = $this->Get_One_Data($id);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/Specialty'), $imageName);
            $data['image'] = $imageName;
            $specialty->update(array_merge($request->all(),$data));
        }
        else
        {
            $specialty->update($request->all());
        }
    }

    public function Update_Status_One_Data($id)
    {
        $specialty = $this->Get_One_Data($id);
        if ($specialty->status == 1) {
            $specialty->status = '0';
        } elseif ($specialty->status == 0) {
            $specialty->status = '1';
        }
        $specialty->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->specialty->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $specialtys = $this->Get_Many_Data($request);
        foreach($specialtys as $Specialty)
        {
            if ($Specialty->status == 1) {
                $Specialty->status = '0';
            } elseif ($Specialty->status == 0) {
                $Specialty->status = '1';
            }
            $Specialty->update();
        }
    }

    public function Get_List_Data()
    {
        return $this->specialty->select('title','id')->where('status',1)->orderby('order','asc')->get();
    }
}

