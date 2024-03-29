<?php

namespace App\Repositories\Core_Data;


use App\Http\Requests\Core_Data\Company_Insurance\CreateRequest;
use App\Http\Requests\Core_Data\Company_Insurance\EditRequest;
use App\Http\Requests\Core_Data\Company_Insurance\StatusEditRequest;
use App\Interfaces\Core_Data\CompanyInsuranceInterface;
use App\Models\Core_Data\Company_Insurance;
use Illuminate\Http\Request;

class CompanyInsuranceRepository implements CompanyInsuranceInterface
{

    protected $company_insurance;

    public function __construct(Company_Insurance $company_insurance)
    {
        $this->company_insurance = $company_insurance;
    }

    public function Get_All_Data()
    {
        return $this->company_insurance->orderby('order', 'asc')->get();
    }

    public function Create_Data(CreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/company_insurance'), $imageName);
        $data['image'] = $imageName;
        $data['status'] = 1;
        $this->company_insurance->create(array_merge($request->all(), $data));
    }

    public function Get_One_Data_Translation($id)
    {
        $company_insurance = $this->company_insurance->find($id)->translations;
        return $company_insurance ? array_merge($this->company_insurance->find($id)->toarray(), $company_insurance) : $this->company_insurance->find($id);
    }

    public function Get_One_Data($id)
    {
        return $this->company_insurance->find($id);
    }

    public function Update_Data(EditRequest $request, $id)
    {
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname() . '-' . time() . '-image.' . Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/company_insurance'), $imageName);
            $data['image'] = $imageName;
            $this->Get_One_Data($id)->update(array_merge($request->all(), $data));
        } else $this->Get_One_Data($id)->update($request->all());
    }

    public function Update_Status_One_Data($id)
    {
        $company_insurance = $this->Get_One_Data($id);
        $company_insurance->status == 1 ? $company_insurance->status = '0' : $company_insurance->status = '1';
        $company_insurance->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->company_insurance->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Datas(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $company_insurance) {
            $company_insurance->status == 1 ? $company_insurance->status = '0' : $company_insurance->status = '1';
            $company_insurance->update();
        }
    }

    public function Get_List_Data()
    {
        return $this->company_insurance->where('status', 1)->orderby('order', 'asc')->get();
    }
}
