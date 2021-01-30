<?php

namespace App\Http\Resources\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
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
            'mobile' => $this->mobile ? $this->mobile : "",
            'email' => $this->email ? $this->email : "",
            'address' => $this->address ? $this->address : "",
            'time_work' => $this->time_work ? $this->time_work : "",
        ];
    }
}
