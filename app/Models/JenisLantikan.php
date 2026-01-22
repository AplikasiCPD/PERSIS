<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisLantikan extends Model
{
    protected $table = 'jenis_lantikan';
    protected $primaryKey = 'kod_lantikan';
    public $timestamps = false;

    protected $fillable = [
        'kod_lantikan',
        'info_lantikan',
    ];

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
