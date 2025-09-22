<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccommodationOption>
 */
class AccommodationOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->randomElement(['B&B', 'Breakfast Included', 'All-Inclusive', 'Half-Board', 'Full-Board']),
            "accommodation_type_id" => \App\Models\AccommodationType::inRandomOrder()->first()->id,
            "description" => $this->faker->sentence,
            "price_adjustment" => $this->faker->randomFloat(2, 10,0),
        ];
    }
}
