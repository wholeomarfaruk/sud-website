<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'author_name',
        'designation',
        'content',
        'image_id',
        'video_id',
        'status',
        'sort_order',
    ];
}
