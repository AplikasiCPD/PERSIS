<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kumpulan extends Model
{
    protected $table = 'kumpulan';
    protected $primaryKey = 'kod_kump';
    public $timestamps = false;

    protected $fillable = [
        'kod_kump',
        'info_kod',
    ];

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
