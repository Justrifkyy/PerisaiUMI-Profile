<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizationalStructure extends Model
{
    protected $fillable = [
        'position',
        'name',
        'photo',
        'department_id',
        'level',
        'order',
        'period',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'level' => 'integer',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('level')->orderBy('order');
    }

    public function scopeByPeriod($query, $period)
    {
        return $query->where('period', $period);
    }
}
