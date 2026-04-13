<?php

namespace Database\Seeders;

use App\Models\WorkProgram;
use App\Models\Department;
use Illuminate\Database\Seeder;

class WorkProgramSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        $department = Department::first();

        if ($department) {
            WorkProgram::create([
                'department_id' => $department->id,
                'name' => 'Workshop Teknologi Web',
                'slug' => 'workshop-teknologi-web',
                'short_description' => 'Workshop untuk meningkatkan skill programming peserta',
                'content' => '<h2>Workshop Teknologi Web</h2><p>Program workshop rutin yang dirancang untuk meningkatkan kemampuan peserta dalam bidang web development.</p>',
                'cover_image' => null,
                'gallery_images' => null,
                'order' => 1,
                'is_active' => true,
            ]);

            WorkProgram::create([
                'department_id' => $department->id,
                'name' => 'Hackathon 2024',
                'slug' => 'hackathon-2024',
                'short_description' => 'Kompetisi coding tahunan dengan hadiah menarik',
                'content' => '<h2>Hackathon 2024</h2><p>Acara tahunan yang menghadirkan kompetisi coding dengan tema inovasi teknologi.</p>',
                'cover_image' => null,
                'gallery_images' => null,
                'order' => 2,
                'is_active' => true,
            ]);
        }
    }
}
