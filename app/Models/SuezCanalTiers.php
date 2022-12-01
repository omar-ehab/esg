<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalTiers extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'number',
        'southbound_percentage',
        'northbound_percentage',
    ];

    protected $casts = [
        'number' => 'integer',
        'southbound_percentage' => 'float',
        'northbound_percentage' => 'float',
    ];
}
