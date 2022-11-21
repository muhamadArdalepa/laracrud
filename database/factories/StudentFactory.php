<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => fake()->unique()->numerify('3202016###'),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['M', 'F']),
            'major' => fake()->randomElement([
                'Informatics Engineering',
                'Informatics System',
                'Computer Science',
                'Computer Engineering',
                'Telecommunications Engineering'
            ]),
            'address' => fake()->address()
        ];
    }
}
