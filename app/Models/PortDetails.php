<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortDetails extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'port_id'
    ];

    /**
     * @return BelongsTo
     */
    public function port(): BelongsTo
    {
        return $this->belongsTo(Port::class, 'port_id');
    }
}
