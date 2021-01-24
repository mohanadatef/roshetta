<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title'
    ];
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
    public function permission()
    {
        return $this->belongsToMany('App\Models\ACL\Permission', 'permission_roles')->withTimestamps('created_at','updated_at');
    }
    public $translatable = ['title'];
    protected $table = 'roles';
    public $timestamps = true;

}