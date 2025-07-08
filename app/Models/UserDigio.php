<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class UserDigio extends Model
{
    use SoftDeletes;

    protected $table = 'users_digio';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'userid',
        'display_name',
        'title',
        'group',
        'dir',
        'iss',
        'aud',
        'jwt_exp',
        'token',
        'district_name',
        'email_verified_at',
        'password',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
