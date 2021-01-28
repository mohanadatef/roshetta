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
            'user_id' => $this->id,
            'name' => $this->first_title ? $this->first_title : "",
            'profile_image' => $this->image ? asset('public/images/user/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
