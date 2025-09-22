<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accommodation>
 */
class AccommodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => \App\Models\Account::where('account_type', 'Accommodation')->inRandomOrder()->first()?->id,
            'rating' => $this->faker->optional()->randomFloat(2, 1, 5),
            'address' => $this->faker->optional()->address(),
        ];
    }
}
