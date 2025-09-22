<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccommodationTypeImage>
 */
class AccommodationTypeImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "accommodation_type_id"=> \App\Models\AccommodationType::inRandomOrder()->first()?->id,
            "image_url"=> $this->faker->imageUrl(640, 480, 'building', true),
            "alt_text"=> $this->faker->optional()->sentence(),
        ];
    }
}
