<?php

namespace App\Models\Acl;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Vendor extends Model
{
    use HasTranslations;
    protected $fillable = [
        'detail','user_id','status_request','license','image_license','count_view','valuation','title','date_license_end','image','address','country_id','city_id','area_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public $translatable = ['detail','title','address'];
    protected $table = 'vendors';
    public $timestamps = true;
}
