<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalMooringAndLights extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'grt_from',
        'grt_to',
        'launch',
        'projector',
    ];

    protected $casts = [
        'grt_from' => 'float',
        'grt_to' => 'float',
        'launch' => 'float',
        'projector' => 'float',
    ];
}
