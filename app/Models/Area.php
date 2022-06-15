<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model 
{

    protected $table = 'areas';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}