<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'slug',
        'release',
        'date',
        'rating',
        'ticket',
        'price',
        'country',
        'genre',
        'photo',
        'status',
    ];
}
