<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName(),
            "email" => $this->faker->unique()->safeEmail(),
            "phone" => '+' . $this->faker->numerify('###########'),
            "contact_type" => $this->faker->randomElement(['Travel Agent', 'Tour Guide', 'Hotel Manager', 'Transport Provider', 'Client']),
            "account_id" => Account::inRandomOrder()->first()?->id,
            ];
    }
}
