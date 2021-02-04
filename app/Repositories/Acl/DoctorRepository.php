<?php

namespace App\Repositories\Acl;

use App\Http\Requests\Acl\Doctor\StatusEditRequest;
use App\Interfaces\Acl\DoctorInterface;
use App\Models\Acl\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DoctorRepository implements DoctorInterface
{
    protected $user;
    protected $doctor;

    public function __construct(User $user,Doctor $doctor)
    {
        $this->user = $user;
        $this->doctor = $doctor;
    }

    public function Get_All_Data()
    {
        return $this->user->where('role_id', 4)->whereHas('doctor', function (Builder $query) {
            $query->where('status_request',1);
        })->get();
    }

    public function Get_All_Data_Request()
    {
        return $this->user->where('role_id', 4)->whereHas('doctor', function (Builder $query) {
            $query->where('status_request',0);
        })->get();
    }

    public function Get_One_Data($id)
    {
        return $this->user->where('id', $id)->where('role_id', 4)->first();
    }

    public function Get_One_Doctor($id)
    {
        return $this->doctor->find($id);
    }

    public function Update_Status_One_Data($id)
    {
        $user = $this->Get_One_Data($id);
        $user->status == 1 ? $user->status = '0' : $user->status = '1';
        $user->update();
    }

    public function Update_Status_One_Doctor_Request($id)
    {
        $doctor = $this->Get_One_Doctor($id);
        $doctor->status_request == 1 ? $doctor->status_request = '0' : $doctor->status_request = '1';
        $doctor->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->user->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Data(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $user) {
            $user->status == 1 ? $user->status = '0' : $user->status = '1';
            $user->update();
        }
    }

    public function Get_List_Data_By_Name($title)
    {
        $doctor = [];
        foreach (Language() as $lang) {
            $doctor = array_merge($doctor, $this->user->whereHas('doctor', function (Builder $query) {
                $query->where('status_request',1);
            })->where('role_id', 4)->where('status', 1)->where('title->' . $lang->code, 'like', $title . '%')
                ->orwhereHas('doctor', function (Builder $query) {
                    $query->where('status_request',1);
                })->where('role_id', 4)->where('status', 1)->where('title->' . $lang->code, 'like', '%' . $title . '%')
                ->orwhereHas('doctor', function (Builder $query) {
                    $query->where('status_request',1);
                })->where('role_id', 4)->where('status', 1)->where('title->' . $lang->code, 'like', '%' . $title)
                ->select('id')->get()->toarray());
        }
        return $this->user->wherein('id', $doctor)->paginate(25);
    }

    public function Update_View($id)
    {
       $doctor= $this->Get_One_Doctor($id);
        $doctor->count_view=$doctor->count_view+1;
        $doctor->update();
    }
}
