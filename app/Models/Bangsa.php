<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bangsa extends Model
{
    protected $table = 'bangsa';
    protected $primaryKey = 'kod_bangsa';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kod_bangsa',
        'info_bangsa',
    ];

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
