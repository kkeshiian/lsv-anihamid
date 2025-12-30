<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HajiPackage extends Model
{
    protected $fillable = [
        'name',
        'type',
        'price',
        'duration',
        'description',
        'facilities',
        'quota',
        'estimated_departure',
        'hotel',
        'airline',
        'image',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
