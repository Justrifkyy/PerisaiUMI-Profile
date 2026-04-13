<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'PSDM',
                'slug' => 'psdm',
                'description' => 'Departemen Pengembangan Sumber Daya Manusia fokus pada pengembangan kapasitas anggota.',
                'vision' => 'Menjadi departemen terdepan dalam pengembangan SDM',
                'mission' => 'Memberikan pelatihan dan workshop berkelanjutan untuk meningkatkan kompetensi anggota',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'KOMPRES',
                'slug' => 'kompres',
                'description' => 'Departemen Kompetisi dan Prestasi mengorganisir kompetisi dan meraih prestasi.',
                'vision' => 'Menjadi inkubator prestasi mahasiswa berkualitas',
                'mission' => 'Memfasilitasi peserta untuk berkompetisi di tingkat nasional dan internasional',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'HUMAS',
                'slug' => 'humas',
                'description' => 'Departemen Hubungan Masyarakat mengelola komunikasi eksternal.',
                'vision' => 'Membangun reputasi positif dan kemitraan strategis',
                'mission' => 'Menjalin hubungan baik dengan stakeholder internal dan eksternal',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'RISTEK',
                'slug' => 'ristek',
                'description' => 'Departemen Riset dan Teknologi fokus pada inovasi dan penelitian.',
                'vision' => 'Menghasilkan inovasi teknologi yang berdampak sosial',
                'mission' => 'Mendorong penelitian dan pengembangan teknologi terdepan',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'PENALARAN',
                'slug' => 'penalaran',
                'description' => 'Departemen Penalaran dan Karya Ilmiah mengembangkan kemampuan akademik.',
                'vision' => 'Menjadi pusat pengembangan karya ilmiah berkualitas',
                'mission' => 'Membimbing penulisan karya ilmiah dan penelitian akademik',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'MEDIA',
                'slug' => 'media',
                'description' => 'Departemen Media dan Informasi mengelola komunikasi internal dan konten digital.',
                'vision' => 'Menjadi media informasi terpercaya dan berkualitas',
                'mission' => 'Menghasilkan konten berkualitas tinggi dan komunikasi efektif',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }
    }
}
