<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sub_Specialty extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order'
    ];
    public $translatable = ['title'];
    protected $table = 'sub_specialties';
    public $timestamps = true;
}