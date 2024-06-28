<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'travel_id' => Travel::factory(),
            'name' => $this->faker->name,
            'starting_date' => $this->faker->dateTime,
            'ending_date' => now()->addDays(rand(1, 10)),
            'price' => fake()->randomFloat(2, 10, 10000),

        ];
    }
}
