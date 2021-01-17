<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Setting_Detail extends Model
{
    protected $fillable = [
        'title','language_id','setting_id'
    ];
    protected $table = 'setting_details';
    public $timestamps = true;
}
