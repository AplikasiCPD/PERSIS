<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusGred extends Model
{
    protected $table = 'status_gred';
    protected $primaryKey = 'kod_status';
    public $incrementing = false;
    protected $keyType = 'string';

    public function Staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

}
