<?php

namespace App\Http\Resources\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
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
            'detail' => $this->detail ? strip_tags($this->detail) : "",
            'image' => $this->image ? asset('public/images/about_us/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
