<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gred extends Model
{
    protected $table = 'gred';
    protected $primaryKey = 'kod_gred';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kod_gred',
        'info_gred',
        'gaji_min',
        'gaji_max',
        'kenaikan',
        'kod_jawatan',
        'kod_kump',
        'status_gred'
    ];

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
