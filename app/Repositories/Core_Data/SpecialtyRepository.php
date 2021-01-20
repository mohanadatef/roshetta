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
        $this->Specialty = $Specialty;
    }

    public function Get_All_Data()
    {
        return $this->Specialty->all();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/Specialty'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->Specialty->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        return array_merge($this->Specialty->find($id)->toarray(),$this->Specialty->find($id)->translations);
    }

    public function Get_One_Data($id)
    {
        return $this->Specialty->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $Specialty = $this->Get_One_Data($id);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/Specialty'), $imageName);
            $data['image'] = $imageName;
            $Specialty->update(array_merge($request->all(),$data));
        }
        else
        {
            $Specialty->update($request->all());
        }
    }

    public function Update_Status_One_Data($id)
    {
        $Specialty = $this->Get_One_Data($id);
        if ($Specialty->status == 1) {
            $Specialty->status = '0';
        } elseif ($Specialty->status == 0) {
            $Specialty->status = '1';
        }
        $Specialty->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->Specialty->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $Specialtys = $this->Get_Many_Data($request);
        foreach($Specialtys as $Specialty)
        {
            if ($Specialty->status == 1) {
                $Specialty->status = '0';
            } elseif ($Specialty->status == 0) {
                $Specialty->status = '1';
            }
            $Specialty->update();
        }
    }
}

