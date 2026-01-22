<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bahagian extends Model
{
    protected $table = 'bahagian';
    protected $primaryKey = 'kod_bhgn';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kod_bhgn',
        'info_bhgn',
        'singkatan'
    ];

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
