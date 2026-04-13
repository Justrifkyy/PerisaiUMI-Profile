<?php

namespace Database\Seeders;

use App\Models\WebSetting;
use Illuminate\Database\Seeder;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        WebSetting::create([
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'email' => 'contact@perisaiumi.ac.id',
            'phone' => '+62812345678',
            'address' => 'Jl. Universitas Muhammadiyah, Jakarta 12720, Indonesia',
        ]);
    }
}
