<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Medicine\CreateRequest;
use App\Http\Requests\Core_Data\Medicine\EditRequest;
use App\Http\Requests\Core_Data\Medicine\StatusEditRequest;
use App\Interfaces\Core_Data\MedicineInterface;
use App\Models\Core_Data\Medicine;
use Illuminate\Http\Request;

class MedicineRepository implements MedicineInterface
{

    protected $medicine;

    public function __construct(Medicine $medicine)
    {
        $this->medicine = $medicine;
    }

    public function Get_All_Data()
    {
        return $this->medicine->orderby('order','asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/medicine'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->medicine->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data_Translation($id)
    {
        $medicine =  $this->medicine->find($id)->translations;
        if($medicine)
        {
            return array_merge($this->medicine->find($id)->toarray(),$medicine);
        }
        else
        {
            return $this->medicine->find($id);
        }
    }

    public function Get_One_Data($id)
    {
        return $this->medicine->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $medicine = $this->Get_One_Data($id);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'-image.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/medicine'), $imageName);
            $data['image'] = $imageName;
            $medicine->update(array_merge($request->all(),$data));
        }
        else
        {
            $medicine->update($request->all());
        }
    }

    public function Update_Status_One_Data($id)
    {
        $medicine = $this->Get_One_Data($id);
        if ($medicine->status == 1) {
            $medicine->status = '0';
        } elseif ($medicine->status == 0) {
            $medicine->status = '1';
        }
        $medicine->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return  $this->medicine->wherein('id',$request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {

        $medicines = $this->Get_Many_Data($request);
        foreach($medicines as $medicine)
        {
            if ($medicine->status == 1) {
                $medicine->status = '0';
            } elseif ($medicine->status == 0) {
                $medicine->status = '1';
            }
            $medicine->update();
        }
    }
}