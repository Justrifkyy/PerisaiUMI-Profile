<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    protected $table = 'web_settings';

    protected $fillable = [
        'video_url',
        'email',
        'phone',
        'address',
    ];

    /**
     * Get the single web setting (only 1 row data)
     */
    public static function getSettings()
    {
        return self::first() ?? self::create([
            'video_url' => null,
            'email' => null,
            'phone' => null,
            'address' => null,
        ]);
    }
}
