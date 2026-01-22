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
    public $timestamps = false;

    protected $fillable = [
        'staff_id',
        'user_pwd',
        'user_level',
        'info_level',
    ];

    protected $hidden = [
        'user_pwd',
    ];

    /**
     * Get the staff that owns the login.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'staff_id');
    }
}
