<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManasikVideo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'thumbnail',
        'category',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
