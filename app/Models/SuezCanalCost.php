<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuezCanalCost extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'ship_type_id',
        'scnt_from',
        'scnt_to',
        'slice',
        'laden_cost',
        'ballest_cost',
    ];

    protected $casts = [
        'scnt_from' => 'float',
        'scnt_to' => 'float',
        'laden_cost' => 'float',
        'ballest_cost' => 'float',
    ];

    public function shipType(): BelongsTo
    {
        return $this->belongsTo(SuezCanalShipType::class, 'ship_type_id');
    }

}
