<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SuezCanalShipType extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public function costs(): HasMany
    {
        return $this->hasMany(SuezCanalCost::class, 'ship_type_id');
    }
}
