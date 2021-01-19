<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','image','title','order'
    ];
    public $translatable = ['title'];
    protected $table = 'countries';
    public $timestamps = true;
}