<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalUsufruct extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'from',
        'to',
        'tariif',
    ];

    protected $casts = [
        'from' => 'float',
        'to' => 'float',
        'tariif' => 'float'
    ];
}
