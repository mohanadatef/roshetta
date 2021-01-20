<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product_Category extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','image','title','order'
    ];
    public function product()
    {
        return $this->hasMany('App\Models\Core_Data\Product');
    }
    public $translatable = ['title'];
    protected $table = 'product_categories';
    public $timestamps = true;
}