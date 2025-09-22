<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itinerary>
 */
class ItineraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->sentence(3),
             'start_date' => $this->faker->dateTimeBetween('+0 days', '+1 month'),
            'end_date' => function (array $attributes) {
                $start = $attributes['start_date'] ?? now();
                return \Carbon\Carbon::parse($start)->addDays(rand(1, 7));
            },
            'duration' => rand(1, 5),

        ];
    }
}
