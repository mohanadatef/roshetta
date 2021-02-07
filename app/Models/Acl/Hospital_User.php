<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;

class Hospital_User extends Model
{
    protected $fillable = [
        'hospital_id','user_id','owner'
    ];
    protected $table = 'hospital_users';
    public $timestamps = true;
}
