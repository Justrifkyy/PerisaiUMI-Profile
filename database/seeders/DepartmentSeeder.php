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
            ['name' => 'PSDM', 'full_name' => 'Pengembangan Sumber Daya Manusia', 'order' => 1],
            ['name' => 'KOMPRES', 'full_name' => 'Kompetisi dan Prestasi', 'order' => 2],
            ['name' => 'HUMAS', 'full_name' => 'Hubungan Masyarakat', 'order' => 3],
            ['name' => 'RISTEK', 'full_name' => 'Riset dan Teknologi', 'order' => 4],
            ['name' => 'PENALARAN', 'full_name' => 'Penalaran dan Karya Ilmiah', 'order' => 5],
            ['name' => 'MEDIA', 'full_name' => 'Media dan Informasi', 'order' => 6],
        ];

        foreach ($departments as $dept) {
            Department::create([
                'name' => $dept['name'],
                'full_name' => $dept['full_name'],
                'description' => null,
                'icon' => null,
                'order' => $dept['order'],
                'is_active' => true,
            ]);
        }
    }
}

