<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cawangan extends Model
{
    protected $table = 'cawangan';
    protected $primaryKey = 'kod_caw';
    public $incrementing = false;
    protected $keyType = 'string';

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
