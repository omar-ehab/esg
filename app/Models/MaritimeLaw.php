<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaritimeLaw extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'pdf_path'
    ];
}
