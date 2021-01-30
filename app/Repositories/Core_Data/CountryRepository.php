<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Country\CreateRequest;
use App\Http\Requests\Core_Data\Country\EditRequest;
use App\Http\Requests\Core_Data\Country\StatusEditRequest;
use App\Interfaces\Core_Data\CountryInterface;
use App\Models\Core_Data\Country;
use Illuminate\Http\Request;

class CountryRepository implements CountryInterface
{

    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function Get_All_Data()
    {
        return $this->country->orderby('order', 'asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/country'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->country->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $country = $this->country->find($id)->translations;
        return $country ? array_merge($this->country->find($id)->toarray(), $country) : $this->country->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->country->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/country'), $imageName);
            $data['image'] = $imageName;
            $this->Get_One_Data($id)->update(array_merge($request->all(), $data));
        } else $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $country = $this->Get_One_Data($id);
        $country->status == 1 ? $country->status = '0' : $country->status = '1';
        $country->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->country->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $country) {
            $country->status == 1 ? $country->status = '0' : $country->status = '1';
            $country->update();
        }
    }

    public function Get_List_Data()
    {
        return $this->country->where('status', 1)->orderby('order', 'asc')->get();
    }
}
