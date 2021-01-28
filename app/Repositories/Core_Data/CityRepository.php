<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\City\CreateRequest;
use App\Http\Requests\Core_Data\City\EditRequest;
use App\Http\Requests\Core_Data\City\StatusEditRequest;
use App\Interfaces\Core_Data\CityInterface;
use App\Models\Core_Data\City;
use Illuminate\Http\Request;

class CityRepository implements CityInterface
{

    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function Get_All_Data()
    {
        return $this->city->orderby('order', 'asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $this->city->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $city = $this->city->find($id)->translations;
        return $city ? array_merge($this->city->find($id)->toarray(), $city) : $this->city->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->city->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $city = $this->Get_One_Data($id);
        $city->status == 1 ? $city->status = '0' : $city->status = '1';
        $city->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->city->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $city) {
            $city->status == 1 ? $city->status = '0' : $city->status = '1';
            $city->update();
        }
    }

    public function Get_List_Data_For_Country($country)
    {
        return $this->city->where('country_id', $country)->where('status', 1)->orderby('order', 'asc')->get();
    }
}
