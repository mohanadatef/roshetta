<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'image','facebook','youtube','twitter','logo','title','status_election_show'
    ];
    protected $table = 'settings';
    public $timestamps = true;
}
