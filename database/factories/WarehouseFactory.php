<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->city()),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->country(),
            'email' => fake()->email(),
            'phone_number' => fake()->phoneNumber(),
            'manager_name' => fake()->name(),
            'capacity' => fake()->numberBetween(1, 100),
            'current_usage' => fake()->numberBetween(1, 10)
        ];
    }
}
