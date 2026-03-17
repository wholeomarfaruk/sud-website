<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
      protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
        'source_page',
        'source_url',
        'property_id',
        'status'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
