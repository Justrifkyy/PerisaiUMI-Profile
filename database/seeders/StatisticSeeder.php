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
            'label' => 'Alumni UKM Perisai UMI',
            'period' => '2014-2024',
            'number' => 100,
            'bg_class' => 'bg-zinc-800',
            'text_class' => 'text-gray-400',
            'order' => 1,
            'is_active' => true,
        ]);

        Statistic::create([
            'label' => 'Pengurus UKM Perisai UMI',
            'period' => '2025/2026',
            'number' => 58,
            'bg_class' => 'bg-yellow-400',
            'text_class' => 'text-gray-800',
            'order' => 2,
            'is_active' => true,
        ]);
    }
}

