<?php

namespace App\Http\Resources\Core_Data;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCategoryResource extends JsonResource
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
            'image' => $this->image ? asset('public/images/service_category/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
