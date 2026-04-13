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
            'title' => 'PERISAI Meraih Penghargaan Best Innovation 2024',
            'slug' => 'perisai-penghargaan-best-innovation-2024',
            'category' => 'Prestasi',
            'content' => '<h2>Prestasi Gemilang PERISAI</h2><p>Dalam kompetisi tingkat nasional, tim PERISAI berhasil meraih penghargaan Best Innovation dengan proyek teknologi yang inovatif dan berdampak sosial tinggi.</p>',
            'cover_image' => null,
            'gallery_images' => null,
            'is_published' => true,
            'published_at' => now(),
            'order' => 1,
        ]);

        News::create([
            'title' => 'Workshop Gratis: Memulai Karir di Industri teknologi',
            'slug' => 'workshop-karir-industri-teknologi',
            'category' => 'Kegiatan',
            'content' => '<h2>Workshop Eksklusif</h2><p>PERISAI mengadakan workshop gratis untuk membantu mahasiswa mempersiapkan karir di industri teknologi dengan narasumber dari perusahaan-perusahaan terkemuka.</p>',
            'cover_image' => null,
            'gallery_images' => null,
            'is_published' => true,
            'published_at' => now()->subDays(5),
            'order' => 2,
        ]);

        News::create([
            'title' => 'Program Magang Tersedia di 15 Perusahaan Teknologi',
            'slug' => 'program-magang-15-perusahaan',
            'category' => 'Informasi',
            'content' => '<h2>Kesempatan Magang</h2><p>PERISAI membuka kesempatan magang untuk anggota di berbagai perusahaan teknologi terkemuka dengan benefit yang menarik.</p>',
            'cover_image' => null,
            'gallery_images' => null,
            'is_published' => true,
            'published_at' => now()->subDays(10),
            'order' => 3,
        ]);
    }
}
