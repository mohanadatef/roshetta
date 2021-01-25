<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Medicine_Category\CreateRequest;
use App\Http\Requests\Core_Data\Medicine_Category\EditRequest;
use App\Http\Requests\Core_Data\Medicine_Category\StatusEditRequest;
use App\Interfaces\Core_Data\MedicineCategoryInterface;
use App\Models\Core_Data\Medicine_Category;
use Illuminate\Http\Request;

class MedicineCategoryRepository implements MedicineCategoryInterface
{

    protected $medicine_category;

    public function __construct(Medicine_Category $medicine_category)
    {
        $this->medicine_category = $medicine_category;
    }

    public function Get_All_Data()
    {
        return $this->medicine_category->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/medicine_category'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->medicine_category->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        $medicine_category =  $this->medicine_category->find($id)->translations;
        if($medicine_category)
        {
            return array_merge($this->medicine_category->find($id)->toarray(),$medicine_category);
        }
        else
        {
            return $this->medicine_category->find($id);
        }
    }

    public function Get_One_Data($id)
    {
        return $this->medicine_category->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $medicine_category = $this->Get_One_Data($id);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/medicine_category'), $imageName);
            $data['image'] = $imageName;
            $medicine_category->update(array_merge($request->all(),$data));
        }
        else
        {
            $medicine_category->update($request->all());
        }
    }

    public function Update_Status_One_Data($id)
    {
        $medicine_category = $this->Get_One_Data($id);
        if ($medicine_category->status == 1) {
            $medicine_category->status = '0';
        } elseif ($medicine_category->status == 0) {
            $medicine_category->status = '1';
        }
        $medicine_category->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->medicine_category->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $medicine_categorys = $this->Get_Many_Data($request);
        foreach($medicine_categorys as $medicine_category)
        {
            if ($medicine_category->status == 1) {
                $medicine_category->status = '0';
            } elseif ($medicine_category->status == 0) {
                $medicine_category->status = '1';
            }
            $medicine_category->update();
        }
    }

    public function Get_List_Data()
    {
        return $this->medicine_category->select('title','id')->where('status',1)->orderby('order','asc')->get();
    }
}

