<?php

namespace Database\Factories;

use App\Models\Academy;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Academy>
 */
class AcademyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => User::factory(),
        'name' => fake()->company(),
        'description' => fake()->paragraph(),
        'address' => fake()->streetAddress() . ', ' . fake()->city(),
        'phone' => fake()->numerify('6########'),
        'email' => fake()->unique()->companyEmail(),
    ];
    }
}
