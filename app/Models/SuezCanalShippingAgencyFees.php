<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalShippingAgencyFees extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'type',
        'title',
        'from',
        'to',
        'tariif'
    ];

    protected $casts = [
        'from' => 'float',
        'to' => 'float',
        'tariif' => 'float'
    ];

}
