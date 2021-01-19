<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Privacy extends Model
{
    use HasTranslations;
    protected $fillable = [
        'detail'
    ];
    public $translatable = ['detail'];
    protected $table = 'privacies';
    public $timestamps = true;
}