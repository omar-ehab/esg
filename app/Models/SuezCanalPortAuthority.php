<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalPortAuthority extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'tariif'];

    protected $casts = [
        'tariif' => 'float'
    ];
}
