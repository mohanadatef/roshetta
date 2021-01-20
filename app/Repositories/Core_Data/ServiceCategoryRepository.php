<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Service_Category\CreateRequest;
use App\Http\Requests\Core_Data\Service_Category\EditRequest;
use App\Http\Requests\Core_Data\Service_Category\StatusEditRequest;
use App\Interfaces\Core_Data\ServiceCategoryInterface;
use App\Models\Core_Data\Service_Category;
use Illuminate\Http\Request;

class ServiceCategoryRepository implements ServiceCategoryInterface
{

    protected $service_category;

    public function __construct(Service_Category $service_category)
    {
        $this->service_category = $service_category;
    }

    public function Get_All_Data()
    {
        return $this->service_category->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/service_category'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->service_category->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        return array_merge($this->service_category->find($id)->toarray(),$this->service_category->find($id)->translations);
    }

    public function Get_One_Data($id)
    {
        return $this->service_category->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $service_category = $this->Get_One_Data($id);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/service_category'), $imageName);
            $data['image'] = $imageName;
            $service_category->update(array_merge($request->all(),$data));
        }
        else
        {
            $service_category->update($request->all());
        }
    }

    public function Update_Status_One_Data($id)
    {
        $service_category = $this->Get_One_Data($id);
        if ($service_category->status == 1) {
            $service_category->status = '0';
        } elseif ($service_category->status == 0) {
            $service_category->status = '1';
        }
        $service_category->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->service_category->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $service_categorys = $this->Get_Many_Data($request);
        foreach($service_categorys as $service_category)
        {
            if ($service_category->status == 1) {
                $service_category->status = '0';
            } elseif ($service_category->status == 0) {
                $service_category->status = '1';
            }
            $service_category->update();
        }
    }

    public function Get_List_Data()
    {
        return $this->service_category->select('title','id')->where('status',1)->orderby('order','asc')->get();
    }
}

