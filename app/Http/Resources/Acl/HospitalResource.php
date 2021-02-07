<?php

namespace App\Http\Resources\Acl;

use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource
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
            'image' => $this->image ? asset('public/images/hospital/' . $this->image) : asset('public/images/user/profile_user.jpg'),
            'count_view' => $this->count_view ? $this->count_view  : "0" ,
            'valuation' => $this->valuation ? $this->valuation : "0" ,
            'detail' => $this->detail ? strip_tags($this->detail) : ""  ,
        ];
    }
}
