<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Academy;
use App\Models\Course;



class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // CourseSeeder.php
 public function run(): void
{

    $academies = Academy::all();

    foreach ($academies as $academy) {
        
            Course::factory(5)->create([
                'academy_id' => $academy->id,   // el curso pertenece a esta academia
            ]);
    }
}
}
