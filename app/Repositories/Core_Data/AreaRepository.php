<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Area\CreateRequest;
use App\Http\Requests\Core_Data\Area\EditRequest;
use App\Http\Requests\Core_Data\Area\StatusEditRequest;
use App\Interfaces\Core_Data\AreaInterface;
use App\Models\Core_Data\Area;
use Illuminate\Http\Request;

class AreaRepository implements AreaInterface
{

    protected $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    public function Get_All_Data()
    {
        return $this->area->orderby('order', 'asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $this->area->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $area = $this->area->find($id)->translations;
        return $area ? array_merge($this->area->find($id)->toarray(), $area) : $this->area->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->area->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $area = $this->Get_One_Data($id);
        $area->status == 1 ? $area->status = '0' : $area->status = '1';
        $area->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->area->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $area) {
            $area->status == 1 ? $area->status = '0' : $area->status = '1';
            $area->update();
        }
    }
}
