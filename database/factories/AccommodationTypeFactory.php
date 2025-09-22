<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccommodationType>
 */
class AccommodationTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [         
            "accommodation_id" => \App\Models\Accommodation::inRandomOrder()->first()?->id,
            "name" => $this->faker->randomElement(['Single Room', 'Double Room', 'Suite', 'Family Room', 'Deluxe Room']),
            "description" => $this->faker->sentence,   
            "price_per_night" => $this->faker->randomFloat(2, 50, 500),
            "max_occupancy" => $this->faker->numberBetween(1, 6), 
            "pets_allowed"=> $this->faker->boolean,
            "amenities" => implode(',', $this->faker->randomElements(['WiFi', 'Air Conditioning', 'Breakfast Included', 'Swimming Pool', 'Gym', 'Parking'], 3, false)),
        ];
    }
}
