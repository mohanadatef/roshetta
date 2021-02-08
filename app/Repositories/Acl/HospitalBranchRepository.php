<?php

namespace App\Repositories\Acl;

use App\Http\Requests\Acl\Hospital_Branch\CreateRequest;
use App\Http\Requests\Acl\Hospital_Branch\EditRequest;
use App\Interfaces\Acl\HospitalBranchInterface;
use App\Models\Acl\Hospital_Branch;
use Illuminate\Support\Facades\Auth;

class HospitalBranchRepository implements HospitalBranchInterface
{
    protected $hospital_branch;

    public function __construct(Hospital_Branch $hospital_branch)
    {
        $this->hospital_branch = $hospital_branch;
    }

    public function Get_All_Data()
    {
        return $this->hospital_branch->where('hospital_id', Auth::user()->hospital->id)->get();
    }

    public function Get_One_Data($id)
    {
        return $this->hospital_branch->find($id);
    }

    public function Get_One_Data_Translation($id)
    {
        $hospital_branch = $this->hospital_branch->find($id)->translations;
        return $hospital_branch ? array_merge($this->hospital_branch->with('hospital')->find($id)->toarray(), $hospital_branch) : $this->hospital_branch->with('hospital')->find($id);
    }

    public function Create_Data(CreateRequest $request)
    {
        $data['hospital_id']=Auth::user()->hospital->id;
        return $this->hospital_branch->create(array_merge($request->all(),$data));
    }

    public function Update_Data(EditRequest $request, $id)
    {
        $this->Get_One_Data($id)->update($request->all());
    }
}
