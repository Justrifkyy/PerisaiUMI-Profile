<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'PERISAI HUMANITY',
            'description' => 'Program kemanusiaan dan pengabdian masyarakat yang dilakukan oleh anggota PERISAI UMI untuk memberikan dampak positif bagi lingkungan sekitar.',
            'gradient' => 'from-yellow-500 to-yellow-700',
            'image' => 'images/prestasi.jpg',
            'category' => 'humanity',
            'is_published' => true,
            'published_at' => now(),
            'order' => 1,
        ]);

        News::create([
            'title' => 'PRESTASI PERISAI',
            'description' => 'Pencapaian dan penghargaan yang diraih oleh anggota PERISAI UMI dalam berbagai kompetisi riset dan inovasi tingkat nasional maupun internasional.',
            'gradient' => 'from-yellow-500 to-yellow-700',
            'image' => 'images/prestasi.jpg',
            'category' => 'achievement',
            'is_published' => true,
            'published_at' => now(),
            'order' => 2,
        ]);
    }
}

