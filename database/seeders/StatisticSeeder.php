<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statistic::create([
            'label' => 'Alumni Tersebar',
            'value' => '150+',
            'description' => '2014-2024',
            'order' => 1,
            'is_active' => true,
        ]);

        Statistic::create([
            'label' => 'Anggota Aktif',
            'value' => '58+',
            'description' => 'Periode 2025/2026',
            'order' => 2,
            'is_active' => true,
        ]);

        Statistic::create([
            'label' => 'Program Kerja',
            'value' => '45+',
            'description' => 'Setiap tahunnya',
            'order' => 3,
            'is_active' => true,
        ]);

        Statistic::create([
            'label' => 'Penghargaan',
            'value' => '30+',
            'description' => 'Tingkat Nasional & Internasional',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}
