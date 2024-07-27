<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->numberBetween(1, 200),
            'warehouse_id' => fake()->numberBetween(1, 10),
            'location_id' => fake()->numberBetween(1, 10),
            'quantity' => fake()->numberBetween(1, 10),
            'batch_lot_number' => 'BATCH' . (string)fake()->numberBetween(1, 10),
            'expiration_date' => fake()->date('Y-m-d', '01-01-2050'),
            'last_restocked' => fake()->date('Y-m-d', 'now'),
            'last_sold' => fake()->date('Y-m-d', 'now'),
            'reorder_level' => fake()->numberBetween(1, 10),
            'minimum_quantity' => fake()->numberBetween(10, 100),
            'maximum_quantity' => fake()->numberBetween(50, 100),
            'cost_price' => fake()->numberBetween(100, 10000),
            'selling_price' => fake()->numberBetween(100, 10000),
            'discount' => 0,
            'total_value' => fake()->numberBetween(100, 10000),
            'notes' => fake()->sentence(),
            'tags' => ucwords(fake()->word()) . ',' . ucwords(fake()->word()) . ',' . ucwords(fake()->word()),
            'status' => 'active'
        ];
    }
}
