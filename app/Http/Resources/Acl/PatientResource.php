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
            'first_title' => $this->first_title ? $this->first_title : "",
            'second_title' => $this->second_title ? $this->second_title : "",
            'email' => $this->email ? $this->email : "",
            'mobile' => $this->mobile ? $this->mobile : "",
            'status' => $this->status ? $this->status : "",
            'status_login' => $this->status_login ? $this->status_login : "",
            'gender' => $this->gender == 1 ? trans('lang.Man') : ($this->gender == 0 ? trans('lang.Woman') : ""),
            'date_birth' => $this->date_birth ? $this->date_birth : "",
            'token' => $this->token ? $this->token : "",
            'language_id' => $this->language_id ? $this->language_id : "",
            'role' => $this->role_id ? $this->role->title : "",
            'profile_image' => $this->image ? asset('public/images/user/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
