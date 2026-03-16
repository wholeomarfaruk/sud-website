<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedProperties extends Model
{
    public $fillable = [
        'property_id',
        'sort_order'
    ];
    public function Property(){
        return $this->belongsto(Property::class, 'property_id');
    }
}
