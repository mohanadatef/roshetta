<?php

namespace App\Repositories\Setting;

use App\Http\Requests\Setting\Call_Us\CreateRequest;
use App\Http\Requests\Setting\Call_Us\StatusEditRequest;
use App\Interfaces\Setting\CallUsInterface;
use App\Models\Setting\Call_Us;
use Illuminate\Http\Request;

class CallUsRepository implements CallUsInterface
{

    protected $call_us;

    public function __construct(Call_Us $call_us)
    {
        $this->call_us = $call_us;
    }

    public function Get_All_Unread_Data()
    {
        return $this->call_us->where('status',0)->get();
    }

    public function Get_All_Read_Data()
    {
        return $this->call_us->where('status',1)->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status']=0;
        $this->call_us->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($id)
    {
        return $this->call_us->find($id);
    }

    public function Update_Status_One_Data($id)
    {
        $call_us = $this->Get_One_Data($id);
        $call_us->status == 1 ? $call_us->status = '0' : $call_us->status = '1';
        $call_us->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->call_us->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $call_us) {
            $call_us->status == 1 ? $call_us->status = '0' : $call_us->status = '1';
            $call_us->update();
        }
    }

    public function Delete_Data($id)
    {
        $this->call_us->find($id)->delete();
    }
}
