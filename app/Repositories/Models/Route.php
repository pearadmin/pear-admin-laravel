<?php

namespace App\Repositories\Models;

class Route extends Model
{
    protected $fillable = [
        'domain',
        'method',
        'uri',
        'name',
        'action',
        'middleware',
    ];

    protected $casts = [
        'middleware' => 'json',
    ];
}
