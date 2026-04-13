<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkProgram extends Model
{
    protected $table = 'work_programs';

    protected $fillable = [
        'department_id',
        'name',
        'slug',
        'short_description',
        'content',
        'cover_image',
        'gallery_images',
        'order',
        'is_active',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the department that owns this work program
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
