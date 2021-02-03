<?php

namespace App\Models\Core_Data;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Scientific_Degree extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','order'
    ];
    public function doctor()
    {
        return $this->hasMany('App\Models\Acl\Doctor');
    }
    public $translatable = ['title'];
    protected $table = 'scientific_degrees';
    public $timestamps = true;
}