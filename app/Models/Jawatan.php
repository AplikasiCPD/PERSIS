<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jawatan extends Model
{
    protected $table = 'jawatan';
    protected $primaryKey = 'kod_jawatan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'kod_jawatan',
        'info_jawatan',
        'status'
    ];

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
