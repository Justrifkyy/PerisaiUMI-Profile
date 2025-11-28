<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $fillable = [
        'type',
        'content',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeVision($query)
    {
        return $query->where('type', 'vision');
    }

    public function scopeMission($query)
    {
        return $query->where('type', 'mission');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
