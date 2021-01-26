<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;

class User_Device extends Model
{
    protected $fillable = [
        'user_id','token','token_device','language_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function language()
    {
        return $this->belongsTo('App\Models\Core_Data\Language','language_id');
    }
    protected $table = 'user_devices';
    public $timestamps = true;

}