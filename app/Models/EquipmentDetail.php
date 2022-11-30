<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipmentDetail extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'equipment_id',
        'key',
        'first_value',
        'second_value'
    ];

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }
}
