<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $fillable = [
        'title',
        'location',
        'type',
        'location_id',
        'status',
        'hero_video_id',
        'featured_image_id',
        'hero_image_id',

        // content
        'description',
        'adiditional_info',
        'address',
        'embaded_map',
        'gallery',
        'videos',
        'amenities',

        // seo
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image_id',
        'slug',
    ];



    protected $casts = [
        'hero_image_id' => 'array',
        'additional_info' => 'array',
        'address' => 'array',
        'gallery' => 'array',
        'videos' => 'array',
        'status' => 'boolean',
        'amenities' => 'array',
    ];

    public function getLocation()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
  public function featured()
{
    return $this->hasOne(FeaturedProperties::class, 'property_id', 'id');
}
}
