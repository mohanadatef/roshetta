<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Sub_Specialty\CreateRequest;
use App\Http\Requests\Core_Data\Sub_Specialty\EditRequest;
use App\Http\Requests\Core_Data\Sub_Specialty\StatusEditRequest;
use App\Interfaces\Core_Data\SubSpecialtyInterface;
use App\Models\Core_Data\Sub_Specialty;
use Illuminate\Http\Request;

class SubSpecialtyRepository implements SubSpecialtyInterface
{

    protected $Sub_Specialty;

    public function __construct(Sub_Specialty $Sub_Specialty)
    {
        $this->sub_specialty = $Sub_Specialty;
    }

    public function Get_All_Data()
    {
        return $this->sub_specialty->all();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $this->sub_specialty->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        return array_merge($this->sub_specialty->find($id)->toarray(),$this->sub_specialty->find($id)->translations);
    }

    public function Get_One_Data($id)
    {
        return $this->sub_specialty->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $sub_specialty = $this->Get_One_Data($id);
        $sub_specialty->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $sub_specialty = $this->Get_One_Data($id);
        if ($sub_specialty->status == 1) {
            $sub_specialty->status = '0';
        } elseif ($sub_specialty->status == 0) {
            $sub_specialty->status = '1';
        }
        $sub_specialty->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->sub_specialty->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $Sub_Specialtys = $this->Get_Many_Data($request);
        foreach($Sub_Specialtys as $Sub_Specialty)
        {
            if ($Sub_Specialty->status == 1) {
                $Sub_Specialty->status = '0';
            } elseif ($Sub_Specialty->status == 0) {
                $Sub_Specialty->status = '1';
            }
            $Sub_Specialty->update();
        }
    }
}