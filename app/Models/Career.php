<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Career extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'national_id',
        'job_id',
        'cv_path'
    ];

    /**
     * @return BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
