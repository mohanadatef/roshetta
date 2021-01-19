<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact_Us extends Model
{
    use HasTranslations;
    protected $fillable = [
        'mobile','email','address','time_work'
    ];
    public $translatable = ['address','time_work'];
    protected $table = 'contact_us';
    public $timestamps = true;
}