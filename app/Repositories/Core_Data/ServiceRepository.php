<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Service\CreateRequest;
use App\Http\Requests\Core_Data\Service\EditRequest;
use App\Http\Requests\Core_Data\Service\StatusEditRequest;
use App\Interfaces\Core_Data\ServiceInterface;
use App\Models\Core_Data\Service;
use Illuminate\Http\Request;

class ServiceRepository implements ServiceInterface
{

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function Get_All_Data()
    {
        return $this->service->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['status'] = 1;
        $this->service->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        $service =  $this->service->find($id)->translations;
       return $service ? array_merge($this->service->find($id)->toarray(),$service) : $this->service->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->service->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $service = $this->Get_One_Data($id);
        $service->status == 1 ? $service->status = '0' : $service->status = '1';
        $service->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->service->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach($this->Get_Many_Data($request) as $service)
        {
            $service->status == 1 ? $service->status = '0' : $service->status = '1';
            $service->update();
        }
    }

    public function Get_List_Data_For_Service_Category($service_category)
    {
        return  $this->service->where('service_category_id',$service_category)->where('status',1)->orderby('order', 'asc')->get();
    }
}