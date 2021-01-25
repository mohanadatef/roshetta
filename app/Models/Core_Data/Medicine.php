<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Medicine extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','medicine_category_id','image','detail','price'
    ];
    public function medicine_category()
    {
        return $this->belongsTo('App\Models\Core_Data\Medicine_Category','medicine_category_id');
    }
    public $translatable = ['title','detail'];
    protected $table = 'medicines';
    public $timestamps = true;
}