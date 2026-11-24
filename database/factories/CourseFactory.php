<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Academy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    $start = fake()->dateTimeBetween('+1 week', '+2 months');
    $end = (clone $start)->modify('+' . fake()->numberBetween(1, 6) . ' months');

    return [
        'academy_id' => Academy::factory(),
        'name' => fake()->randomElement([
            'Desarrollo web', 'Inglés B2', 'Diseño gráfico',
            'Contabilidad', 'Fotografía', 'Marketing digital',
        ]),
        'description' => fake()->paragraph(),
        'start_date' => $start,
        'end_date' => $end,
        'capacity' => fake()->numberBetween(20,30),
    ];
    }
}
