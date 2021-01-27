<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'status','code','image','title','order'
    ];
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
    protected $table = 'languages';
    public $timestamps = true;
}