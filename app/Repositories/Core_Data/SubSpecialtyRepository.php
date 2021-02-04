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

    protected $sub_specialty;

    public function __construct(Sub_Specialty $sub_specialty)
    {
        $this->sub_specialty = $sub_specialty;
    }

    public function Get_All_Data()
    {
        return $this->sub_specialty->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $this->sub_specialty->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        $sub_specialty =  $this->sub_specialty->find($id)->translations;
        return $sub_specialty ? array_merge($this->sub_specialty->find($id)->toarray(),$sub_specialty) : $this->sub_specialty->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->sub_specialty->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
       $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $sub_specialty = $this->Get_One_Data($id);
        $sub_specialty->status == 1 ? $sub_specialty->status = '0' : $sub_specialty->status = '1';
        $sub_specialty->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->sub_specialty->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach($this->Get_Many_Data($request) as $sub_specialty)
        {
            $sub_specialty->status == 1 ? $sub_specialty->status = '0' : $sub_specialty->status = '1';
            $sub_specialty->update();
        }
    }

    public function Get_List_Data_For_Specialty($specialty)
    {
        return $this->sub_specialty->where('specialty_id', $specialty)->where('status', 1)->orderby('order', 'asc')->get();
    }
}