<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    /**
     * @return HasMany
     */
    public function careers(): HasMany
    {
        return $this->hasMany(Career::class, 'job_id');
    }
}
