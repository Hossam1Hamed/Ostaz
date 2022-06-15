<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model 
{

    protected $table = 'specializations';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function attachments()
    {
        return $this->morphToMany('Attachment', 'attachmentable');
    }

}