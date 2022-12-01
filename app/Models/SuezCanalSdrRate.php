<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalSdrRate extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['rate', 'date'];

    protected $casts = [
        'rate' => 'float',
        'date' => 'immutable_date'
    ];
}
