<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function areas()
    {
        return $this->hasMany('Area');
    }

}