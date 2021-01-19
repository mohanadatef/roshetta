<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About_Us extends Model
{
    use HasTranslations;
    protected $fillable = [
        'detail','image'
    ];
    public $translatable = ['detail'];
    protected $table = 'about_us';
    public $timestamps = true;
}