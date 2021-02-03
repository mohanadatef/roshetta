<?php

namespace App\Http\Resources\Acl;


use App\Http\Resources\Core_Data\SubSpecialtyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title ? $this->title : "",
            'mobile' => $this->mobile ? $this->mobile : "",
            'gender' => $this->gender == 1 ? trans('lang.Man') : ($this->gender == 0 ? trans('lang.Woman') : trans('lang.Man')),
            'role' => $this->role_id ? $this->role->title : "doctor",
            'profile_image' => $this->image ? asset('public/images/user/' . $this->image) : asset('public/images/user/profile_user.jpg'),
             'specialty' => $this->doctor ? $this->doctor->specialty_id ? $this->doctor->specialty->title : "" : "" ,
            'count_view' => $this->doctor ?$this->doctor->count_view ? $this->doctor->count_view : "0" : "" ,
            'year_experience' => $this->doctor ?$this->doctor->year_experience ? $this->doctor->year_experience : "0" : "" ,
            'valuation' => $this->doctor ?$this->doctor->valuation ? $this->doctor->valuation : "0" : "" ,
            'university' => $this->doctor ?$this->doctor->university ? $this->doctor->university : "" : "" ,
            'detail' => $this->doctor ?$this->doctor->detail ? strip_tags($this->doctor->detail) : "" : "" ,
            'scientific_degree' => $this->doctor ?$this->doctor->scientific_degree_id ? $this->doctor->scientific_degree->title : "" : "" ,
            'status_mobile' => $this->doctor ?$this->doctor->status_mobile ? $this->doctor->status_mobile : "0" : "" ,
            'status_home' => $this->doctor ? $this->doctor->status_home ? $this->doctor->status_home : "0" : "" ,
            'status_clinic' => $this->doctor ?$this->doctor->status_clinic ? $this->doctor->status_clinic : "0" : "" ,
            'sub_specialty' => $this->doctor ?$this->doctor->sub_specialty ? SubSpecialtyResource::Collection($this->doctor->sub_specialty) : "" : "" ,
        ];
    }
}
