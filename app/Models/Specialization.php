<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model 
{
    protected $fillable=['name'];
    protected $table = 'specializations';
    public $timestamps = true;

    use SoftDeletes;
    //append for specialization images
    protected $appends = ['image_path'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function attachments()
    {
        return $this->morphMany( Attachment::class, 'attachmentable');
    }

    public function getImagePathAttribute(){
        return asset('uploads/specs/'.$this->file);
      }

}