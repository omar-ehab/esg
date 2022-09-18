<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactUsMessage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'country_id',
        'message'
    ];

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
