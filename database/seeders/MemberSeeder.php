<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Department;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        // Pembina
        Member::create([
            'department_id' => null,
            'name' => 'Dr. Prof. Andi Supriyono, M.Pd',
            'position' => 'Pembina',
            'hierarchy' => 'pembina',
            'linkedin_url' => 'https://linkedin.com/in/pembina',
            'photo' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        // BPH Inti
        Member::create([
            'department_id' => null,
            'name' => 'Budi Santoso',
            'position' => 'Ketua Umum',
            'hierarchy' => 'inti',
            'linkedin_url' => 'https://linkedin.com/in/ketua-umum',
            'photo' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        Member::create([
            'department_id' => null,
            'name' => 'Siti Nurhaliza',
            'position' => 'Wakil Ketua Umum',
            'hierarchy' => 'inti',
            'linkedin_url' => 'https://linkedin.com/in/wakil-ketua',
            'photo' => null,
            'order' => 3,
            'is_active' => true,
        ]);

        // Kepala Departemen (contoh RISTEK)
        $ristek = Department::first();
        if ($ristek) {
            Member::create([
                'department_id' => $ristek->id,
                'name' => 'Ahmad Hidayat',
                'position' => 'Ketua Departemen RISTEK',
                'hierarchy' => 'kadep',
                'linkedin_url' => 'https://linkedin.com/in/kadep-ristek',
                'photo' => null,
                'order' => 4,
                'is_active' => true,
            ]);

            // Staff
            Member::create([
                'department_id' => $ristek->id,
                'name' => 'Dina Mariana',
                'position' => 'Staf Bendahara',
                'hierarchy' => 'staf',
                'linkedin_url' => 'https://linkedin.com/in/staf-bendahara',
                'photo' => null,
                'order' => 5,
                'is_active' => true,
            ]);
        }
    }
}
