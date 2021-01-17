<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','status'
    ];
    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'role_user', 'user_id','role_id')->paginate();
    }
    public function permission()
    {
        return $this->belongsToMany('App\Models\ACL\Permission', 'permission_role')->withTimestamps('created_at','updated_at');
    }
    protected $table = 'roles';
    public $timestamps = true;

}