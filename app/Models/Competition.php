<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'competitions';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'deadline',
        'description',
        'registration_link',
        'poster_images',
        'order',
        'is_active',
    ];

    protected $casts = [
        'poster_images' => 'array',
        'is_active' => 'boolean',
        'deadline' => 'date',
    ];
}
