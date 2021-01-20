<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order','service_category_id','detail'
    ];
    public function service_category()
    {
        return $this->belongsTo('App\Models\Core_Data\Service_Category','service_category_id');
    }
    public $translatable = ['title','detail'];
    protected $table = 'services';
    public $timestamps = true;
}