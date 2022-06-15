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

    //append for specialization images
    protected $appends = ['image_path'];

    public function attachmentable()
    {
        return $this->morphTo();
    }

    public function getImagePathAttribute(){
        return asset('uploads/specs/'.$this->file);
      }
}