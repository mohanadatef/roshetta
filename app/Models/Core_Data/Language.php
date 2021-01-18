<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'status','code','image','title','order'
    ];
    public function setting_detail()
    {
        return $this->hasMany('App\Models\Setting\Setting_Detail');
    }
    protected $table = 'languages';
    public $timestamps = true;
}