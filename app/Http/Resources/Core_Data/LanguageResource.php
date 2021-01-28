<?php

namespace App\Http\Resources\Core_Data;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
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
            'language_id' => $this->id,
            'title' => $this->title ? $this->title : "",
            'code' => $this->code ? $this->code : "",
            'image' => $this->image ? asset('public/images/language/' . $this->image) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
