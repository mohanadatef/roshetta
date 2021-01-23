<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Permission  extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title','display_title'
    ];
    public function role()
    {
        return $this->belongsToMany('App\Models\ACL\Role', 'permissions_role', 'role_id','permission_id')->paginate();
    }
    public $translatable = ['display_title'];
    protected $table = 'permissions';
    public $timestamps = true;

}