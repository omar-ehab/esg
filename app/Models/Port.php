<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Port extends Model
{
    use HasSlug;

    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'slug',
        'description',
        'lat',
        'lng'
    ];

    /**
     * @return HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(PortDetails::class, 'port_id');
    }


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
