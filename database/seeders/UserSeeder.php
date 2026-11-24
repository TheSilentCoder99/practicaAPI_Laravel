<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // UserSeeder.php
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Alan',
            'email' => 'alan@test.com',
        ]);

        User::factory(2)->create();
    }
}
