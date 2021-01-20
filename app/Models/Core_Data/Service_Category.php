<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service_Category extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','image','title','order'
    ];
    public function service()
    {
        return $this->hasMany('App\Models\Core_Data\Service');
    }
    public $translatable = ['title'];
    protected $table = 'service_categories';
    public $timestamps = true;
}