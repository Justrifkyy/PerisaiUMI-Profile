<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin PERISAI',
            'email' => 'admin@perisaiumi.ac.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Seed all modules
        $this->call([
            WebSettingSeeder::class,
            StatisticSeeder::class,
            DepartmentSeeder::class,
            MemberSeeder::class,
            WorkProgramSeeder::class,
            NewsSeeder::class,
            CompetitionSeeder::class,
        ]);
    }
}