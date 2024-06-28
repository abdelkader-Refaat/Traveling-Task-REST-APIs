<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
            'is_public' => $this->faker->boolean(),
            'description' => $this->faker->paragraph(),
            'number_of_days' => fake()->numberBetween(1, 10),
        ];
    }
}
