<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        Competition::create([
            'title' => 'Kompetisi Inovasi Teknologi Nasional',
            'slug' => 'kompetisi-inovasi-nasional',
            'category' => 'nasional',
            'deadline' => now()->addMonths(2)->toDateString(),
            'description' => '<h2>Kompetisi Nasional</h2><p>Kesempatan emas untuk menunjukkan ide inovasi Anda di tingkat nasional.</p>',
            'registration_link' => 'https://forms.google.com/example',
            'poster_images' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Competition::create([
            'title' => 'International Hackathon Asia',
            'slug' => 'international-hackathon-asia',
            'category' => 'internasional',
            'deadline' => now()->addMonths(3)->toDateString(),
            'description' => '<h2>Hackathon Internasional</h2><p>Berkompetisi dengan peserta dari seluruh Asia dalam ajang hackathon terbesar.</p>',
            'registration_link' => 'https://hackthaon-asia.example.com',
            'poster_images' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        Competition::create([
            'title' => 'Kompetisi Video Editing Dikti',
            'slug' => 'kompetisi-video-editing-dikti',
            'category' => 'video_editing',
            'deadline' => now()->addMonths(1)->toDateString(),
            'description' => '<h2>Kompetisi Video Editing</h2><p>Tunjukkan kreativitas Anda dalam menciptakan video berkualitas tinggi.</p>',
            'registration_link' => 'https://dikti.example.com',
            'poster_images' => null,
            'order' => 3,
            'is_active' => true,
        ]);
    }
}
