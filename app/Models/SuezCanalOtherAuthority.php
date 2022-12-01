<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuezCanalOtherAuthority extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['title', 'tariif'];

    protected $casts = [
        'tariif' => 'float'
    ];
}
