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
        return $this->city->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $this->city->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        return array_merge($this->city->find($id)->toarray(),$this->city->find($id)->translations);
    }

    public function Get_One_Data($id)
    {
        return $this->city->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $city = $this->Get_One_Data($id);
            $city->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $city = $this->Get_One_Data($id);
        if ($city->status == 1) {
            $city->status = '0';
        } elseif ($city->status == 0) {
            $city->status = '1';
        }
        $city->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->city->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $citys = $this->Get_Many_Data($request);
        foreach($citys as $city)
        {
            if ($city->status == 1) {
                $city->status = '0';
            } elseif ($city->status == 0) {
                $city->status = '1';
            }
            $city->update();
        }
    }

    public function Get_List_Data($country)
    {
        return $this->country->select('title','id')->where('country_id',$country)->where('status',1)->orderby('order','asc')->get();
    }
}
