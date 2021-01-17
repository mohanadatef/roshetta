<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;

class Permission  extends Model
{
    protected $fillable = [
        'name','status'
    ];
    public function role()
    {
        return $this->belongsToMany('App\Models\ACL\Role', 'permissions_role', 'role_id','permission_id')->paginate();
    }
    protected $table = 'permissions';
    public $timestamps = true;

}