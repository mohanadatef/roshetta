<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;

class Permission_Detail  extends Model
{
    protected $fillable = [
        'display_name','description','permission_id','language_id'
    ];

    protected $table = 'permission_details';
    public $timestamps = true;

}