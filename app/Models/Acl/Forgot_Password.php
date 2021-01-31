<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Forgot_Password extends Model
{
    protected $fillable = [
        'user_id','code','status'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    protected $table = 'forgot_passwords';
    public $timestamps = true;

}