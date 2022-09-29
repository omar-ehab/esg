<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'image_path', 'link'];
}
