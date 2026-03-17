<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
     protected $fillable = [

        'page_type',
        'page_id',
        'page_slug',
        'url',
        'visitor_ip',
        'user_agent',
        'device_type',
        'referrer_url',
        'session_id',
        'country',
        'visited_at'

    ];

    protected $casts = [

        'visited_at' => 'datetime',

    ];
}
