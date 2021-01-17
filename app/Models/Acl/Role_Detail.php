<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'display_name','description','role_id','language_id'
    ];

    protected $table = 'roles';
    public $timestamps = true;

}