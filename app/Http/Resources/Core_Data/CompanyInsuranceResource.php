<?php

namespace App\Http\Resources\Core_Data;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyInsuranceResource extends JsonResource
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
            'image' => $this->image ? asset('public/images/company_insurance/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
