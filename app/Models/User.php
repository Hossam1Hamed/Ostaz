<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';
    public $timestamps = true;
    
    public const TYPE_ADMIN = 1;
    public const TYPE_EMPLOYEE = 2;
    public const TYPE_INSTRUCTOR = 3;
    public const TYPE_PARENT = 4;
    public const TYPE_STUDENT = 5;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'oauth_id',
        'oauth_type',
        'status',
        'type',
    ];

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

}