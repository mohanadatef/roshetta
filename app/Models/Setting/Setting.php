<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'facebook','youtube','twitter','logo','instagram','app_google','app_ios'
    ];
    public function setting_detail()
    {
        return $this->hasMany('App\Models\Setting\Setting_Detail');
    }
    protected $table = 'settings';
    public $timestamps = true;
}