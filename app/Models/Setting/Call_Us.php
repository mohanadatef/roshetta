<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Call_Us extends Model
{
    protected $fillable = [
        'title','detail','mobile','email','status'
    ];
    protected $table = 'call_us';
    public $timestamps = true;

}