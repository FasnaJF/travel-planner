<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "account_id"=>  Account::where('account_type','Provider')->inRandomOrder()->first()?->id,
            "service_type"=> $this->faker->randomElement(['Tour Operator', 'Hotel', 'Transport Service', 'Travel Agency']),
            "rating"=> $this->faker->optional()->randomFloat(2, 1, 5),
            "description"=> $this->faker->optional()->paragraph(),

        ];
    }
}
