<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model 
{

    protected $table = 'attachments';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'attachmentable_id',
        'attachmentable_type',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachmentable()
    {
        return $this->morphTo();
    }
}