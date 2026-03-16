<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
 protected $fillable = [
        'title',
        'description',
        'featured_image',
        'status',
        'is_featured',
        'meta_title',
        'meta_description',
        'meta_image',
    ];
}
