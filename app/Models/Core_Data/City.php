<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','image','title','order'
    ];
    public $translatable = ['title'];
    protected $table = 'cities';
    public $timestamps = true;
}