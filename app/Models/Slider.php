<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'link',
        'status',
        'sort_order',
        'image_id'
    ];
}
