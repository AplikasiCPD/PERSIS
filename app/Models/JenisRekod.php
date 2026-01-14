<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisRekod extends Model
{
    protected $table = 'jenis_rekod';
    protected $primaryKey = 'kod_rekod';

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
