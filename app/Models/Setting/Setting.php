<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'facebook','youtube','twitter','logo','instagram','app_google','app_ios','status'
    ];
    protected $table = 'settings';
    public $timestamps = true;
}