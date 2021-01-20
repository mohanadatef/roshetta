<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Company_Insurance extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','image'
    ];
    public $translatable = ['title'];
    protected $table = 'company_insurances';
    public $timestamps = true;
}