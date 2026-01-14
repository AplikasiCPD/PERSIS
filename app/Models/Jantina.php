<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Jantina extends Model
{
    use HasFactory;

    protected $table = 'jantina';
    protected $primaryKey = 'kod_jantina';
    public $incrementing = false;
    protected $keyType = 'string';

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
