<?php

namespace App\Http\Resources\Core_Data;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
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
            'detail' => $this->detail ? strip_tags($this->detail) : "",
            'price' => $this->price ? $this->price : "",
            'medicine_category' => $this->medicine_category_id ? $this->medicine_category->title : "",
            'image' => $this->image ? asset('public/images/medicine/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
