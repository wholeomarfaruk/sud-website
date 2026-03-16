<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';
    protected $fillable = [
        'title',
        'duration',
        'sort_order',
        'thumbnail',
        'video_id',
        'is_featured'
    ];
}
