<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;
    protected $fillable = [
        'facebook','youtube','twitter','logo','instagram','app_google','app_ios','title'
    ];
    public $translatable = ['title'];
    protected $table = 'settings';
    public $timestamps = true;
}