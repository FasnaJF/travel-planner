<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" =>  $this->faker->randomElement(['City Tour', 'Airport Transfer', 'Hotel Stay', 'Adventure Package', 'Cultural Experience']),
            "provider_id" => \App\Models\Provider::inRandomOrder()->first()?->id,
            "description" => $this->faker->optional()->paragraph(),
            "price" => $this->faker->randomFloat(2, 20, 500),
            "duration_minutes" => $this->faker->numberBetween(30, 480),

        ];
    }
}
