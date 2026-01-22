<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gelaran extends Model
{
    protected $table = 'gelaran';
    protected $primaryKey = 'kod_gelaran';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kod_gelaran',
        'info_gelaran',
    ];

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
