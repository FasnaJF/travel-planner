<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItineraryItem>
 */
class ItineraryItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'itinerary_id' => \App\Models\Itinerary::inRandomOrder()->value('id'),
            'item_type' => $this->faker->randomElement(['service', 'accommodation']),
            'service_id' => function (array $attributes) {
                return $attributes['item_type'] === 'service'
                    ? \App\Models\Service::inRandomOrder()->value('id')
                    : null;
            },
            'accommodation_type_id' => function (array $attributes) {
                return $attributes['item_type'] === 'accommodation'
                    ? \App\Models\AccommodationType::inRandomOrder()->value('id')
                    : null;
            },
            'accommodation_option_id' => function (array $attributes) {
                return $attributes['item_type'] === 'accommodation'
                    ? \App\Models\AccommodationOption::inRandomOrder()->value('id')
                    : null;
            },
            'start_date' => $this->faker->dateTimeBetween('+0 days', '+1 month'),
            'end_date' => function (array $attributes) {
                $start = $attributes['start_date'] ?? now();
                return \Carbon\Carbon::parse($start)->addDays(rand(1, 7));
            },
            'details' => $this->faker->optional()->text(200),
            'price' => $this->faker->optional()->randomFloat(2, 50, 1000),
        ];
    }
}
