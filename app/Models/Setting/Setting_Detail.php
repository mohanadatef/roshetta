<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Setting_Detail extends Model
{
    protected $fillable = [
        'title','language_id','setting_id'
    ];
    public function setting()
    {
        return $this->belongsTo('App\Models\Setting\Setting','setting_id');
    }
    public function language()
    {
        return $this->belongsTo('App\Models\Core_Data\Language','language_id');
    }
    protected $table = 'setting_details';
    public $timestamps = true;
}
