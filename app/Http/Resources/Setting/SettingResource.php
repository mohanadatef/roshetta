<?php

namespace App\Http\Resources\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'facebook' => $this->facebook ? $this->facebook : "",
            'youtube' => $this->youtube ? $this->youtube : "",
            'twitter' => $this->twitter ? $this->twitter : "",
            'instagram' => $this->instagram ? $this->instagram : "",
            'app_google' => $this->app_google ? $this->app_google : "",
            'app_ios' => $this->app_ios ? $this->app_ios : "",
            'logo' => $this->logo ? asset('public/images/setting/' . $this->logo) : asset('public/images/user/profile_user.jpg'),
        ];
    }
}
