<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'balance' => $this->faker->randomNumber(5),
            'full_name' => $this->faker->name(),
            'card_number' => $this->faker->numberBetween(111111111111111, 9999999999999999),
            'cvv' => $this->faker->randomNumber(3),
            'date_month' => $this->faker->month(),
            'date_year' => $this->faker->numberBetween(2020,2028),
            'password' => bcrypt($this->faker->randomNumber(4)),
            'status' => $this->faker->numberBetween(0,4),
        ];
    }
}
