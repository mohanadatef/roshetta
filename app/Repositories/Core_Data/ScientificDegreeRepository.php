<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Scientific_Degree\CreateRequest;
use App\Http\Requests\Core_Data\Scientific_Degree\EditRequest;
use App\Http\Requests\Core_Data\Scientific_Degree\StatusEditRequest;
use App\Interfaces\Core_Data\ScientificDegreeInterface;
use App\Models\Core_Data\Scientific_Degree;
use Illuminate\Http\Request;

class ScientificDegreeRepository implements ScientificDegreeInterface
{

    protected $scientific_degree;

    public function __construct(Scientific_Degree $scientific_degree)
    {
        $this->scientific_degree = $scientific_degree;
    }

    public function Get_All_Data()
    {
        return $this->scientific_degree->orderby('order', 'asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $this->scientific_degree->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $scientific_degree = $this->scientific_degree->find($id)->translations;
        return $scientific_degree ? array_merge($this->scientific_degree->find($id)->toarray(), $scientific_degree) : $this->scientific_degree->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->scientific_degree->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $scientific_degree = $this->Get_One_Data($id);
        $scientific_degree->status == 1 ? $scientific_degree->status = '0' : $scientific_degree->status = '1';
        $scientific_degree->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->scientific_degree->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $scientific_degree) {
            $scientific_degree->status == 1 ? $scientific_degree->status = '0' : $scientific_degree->status = '1';
            $scientific_degree->update();
        }
    }

    public function Get_List_Data()
    {
        return $this->scientific_degree->where('status', 1)->orderby('order', 'asc')->get();
    }
}