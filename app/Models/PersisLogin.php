<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class PersisLogin extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'persis_login';
    protected $primaryKey = 'staff_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'staff_id',
        'no_kp',
        'user_pwd',
    ];

    protected $hidden = [
        'user_pwd',
    ];
}
