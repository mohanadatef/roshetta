<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasTranslations;
    protected $fillable = [
        'first_name','second_name','email','password','mobile','status','status_login', 'image', 'gender','date_birth','role_id'
    ];
    protected $hidden = [
        'password',
    ];
    public $translatable = ['first_name','second_name'];
    public function role()
    {
        return $this->belongsTo('App\Models\Acl\Role','role_id');
    }
}
