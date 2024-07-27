<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inventory_id' => fake()->numberBetween(1, 200),
            'order_id' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(200, 1000),
            'quantity' => 1,
            'total' => fake()->numberBetween(200, 1000)
        ];
    }
}
