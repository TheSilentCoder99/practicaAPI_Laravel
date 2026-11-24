<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Academy;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // AcademySeeder.php
// Obtengo todos los usuarios, por cada uno creo una academía y a cada academia le doy como dueño, user_id, el usuario que esté siendo recorrido en ese momento
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Creamos una academia con datos falsos
            $academy = Academy::factory()->create([
                'user_id' => $user->id,   // la asignamos a este usuario
            ]);
        }
    }
}
