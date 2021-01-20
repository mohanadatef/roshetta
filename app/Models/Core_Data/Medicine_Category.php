<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Medicine_Category extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','image','title','order'
    ];
    public function product()
    {
        return $this->hasMany('App\Models\Core_Data\Medicine');
    }
    public $translatable = ['title'];
    protected $table = 'medicine_categories';
    public $timestamps = true;
}