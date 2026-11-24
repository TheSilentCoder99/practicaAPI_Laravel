<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;


class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // CourseStudentSeeder.php
    public function run(): void
    {
        // Student::pluck('id') devuelve solo la columna id de todos los alumnos: una colección [1, 2, 3, ..., 25].
        $studentIds = Student::pluck('id');

        Course::all()->each(function (Course $course) use ($studentIds) {

            // De la colección de ids, devuelvo 25 al azar, quedando los otros 15 libres. Con esos 15 podrás probar el attach
            $studentIds = $studentIds->random(25);
            $course->students()->attach($studentIds);
        });
    }
}
