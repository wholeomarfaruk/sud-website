<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'description',
        'status',
        'order',
    ];

 
}
