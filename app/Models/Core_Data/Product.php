<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','product_category_id','image','detail'
    ];
    public function product_category()
    {
        return $this->belongsTo('App\Models\Core_Data\Product_Category','product_category_id');
    }
    public $translatable = ['title','detail'];
    protected $table = 'products';
    public $timestamps = true;
}