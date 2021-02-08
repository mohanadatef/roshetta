<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable,HasTranslations;
    protected $fillable = [
        'title','email','password','mobile','status','status_login', 'image', 'gender','date_birth','role_id','token'
    ];
    protected $hidden = [
        'password',
    ];
    public $translatable = ['title'];
    public function role()
    {
        return $this->belongsTo('App\Models\Acl\Role','role_id');
    }
    public function doctor()
    {
        return $this->hasOne('App\Models\Acl\Doctor');
    }
    public function forgot_password()
    {
        return $this->hasMany('App\Models\Acl\Forgot_Password');
    }
    public function hospital()
    {
        return $this->hasOne('App\Models\Acl\Hospital');
    }
    public function clinic()
    {
        return $this->hasOne('App\Models\Acl\Clinic');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $table = 'users';
    public $timestamps = true;
}
