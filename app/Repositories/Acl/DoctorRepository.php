<?php

namespace App\Repositories\Acl;

use App\Http\Requests\Acl\Doctor\StatusEditRequest;
use App\Interfaces\Acl\DoctorInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DoctorRepository implements DoctorInterface
{
    protected $doctor;

    public function __construct(User $doctor)
    {
        $this->doctor = $doctor;
    }

    public function Get_All_Data()
    {
        return $this->doctor->where('role_id', 4)->whereHas('doctor', function (Builder $query) {
            $query->where('status_request',1);
        })->get();
    }

    public function Get_All_Data_Request()
    {
        return $this->doctor->where('role_id', 4)->whereHas('doctor', function (Builder $query) {
            $query->where('status_request',0);
        })->get();
    }

    public function Get_One_Data($id)
    {
        return $this->doctor->where('id', $id)->where('role_id', 4)->first();
    }

    public function Update_Status_One_Data($id)
    {
        $doctor = $this->Get_One_Data($id);
        $doctor->status == 1 ? $doctor->status = '0' : $doctor->status = '1';
        $doctor->update();
    }

    public function Get_Many_Data(Request $request)
    {
        return $this->doctor->wherein('id', $request->change_status)->get();
    }

    public function Update_Status_Data(StatusEditRequest $request)
    {
        foreach ($this->Get_Many_Data($request) as $doctor) {
            $doctor->status == 1 ? $doctor->status = '0' : $doctor->status = '1';
            $doctor->update();
        }
    }

    public function Get_List_Data_By_Name($title)
    {
        $doctor = [];
        foreach (Language() as $lang) {
            $doctor = array_merge($doctor, $this->doctor->whereHas('doctor', function (Builder $query) {
                $query->where('status_request',1);
            })->where('role_id', 4)->where('status', 1)->where('title->' . $lang->code, 'like', $title . '%')
                ->orwhereHas('doctor', function (Builder $query) {
                    $query->where('status_request',1);
                })->where('role_id', 4)->where('status', 1)->where('title->' . $lang->code, 'like', '%' . $title . '%')
                ->orwhereHas('doctor', function (Builder $query) {
                    $query->where('status_request',1);
                })->where(['role_id', 4],['status', 1],['title->' . $lang->code, 'like', '%' . $title])
                ->select('id')->get()->toarray());
        }
        return $this->doctor->wherein('id', $doctor)->paginate(25);
        // $users = DB::table('users')
        //         ->whereJsonContains('options->languages', ['en', 'de'])
        //         ->get();
    }


}
