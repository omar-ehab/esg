<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'image_path'
    ];

    public function details(): HasMany
    {
        return $this->hasMany(EquipmentDetail::class, 'equipment_id');
    }
}
