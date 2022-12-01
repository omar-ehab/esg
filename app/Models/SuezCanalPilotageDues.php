<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalPilotageDues extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'scnt_from',
        'scnt_to',
        'north_val1',
        'north_val2',
        'south_val1',
        'south_val2',
    ];

    protected $casts = [
        'scnt_from' => 'float',
        'scnt_to' => 'float',
        'north_val1' => 'float',
        'north_val2' => 'float',
        'south_val1' => 'float',
        'south_val2' => 'float',
    ];
}
