<?php

namespace App\Http\Resources\Acl;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'email' => $this->email ? $this->email : "",
            'mobile' => $this->mobile ? $this->mobile : "",
            'status_login' => $this->status_login ? $this->status_login : "0",
            'gender' => $this->gender == 1 ? trans('lang.Man') : ($this->gender == 0 ? trans('lang.Woman') : trans('lang.Man')),
            'date_birth' => $this->date_birth ? $this->date_birth : "",
            'token' => $this->token ? $this->token : "",
            'role' => $this->role_id ? $this->role->title : "patient",
            'profile_image' => $this->image ? asset('public/images/user/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
