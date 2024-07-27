<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_id' => fake()->numberBetween(1, 10),
            'category_id' => fake()->numberBetween(1, 10),
            'name' => ucwords(fake()->word()),
            'description' => ucfirst(fake()->sentence()),
            'sku' => fake()->word(),
            'price' => fake()->numberBetween(200, 1000),
            'cost' => fake()->numberBetween(200, 1000),
            'quantity' => fake()->numberBetween(10, 100),
            'reorder_level' => fake()->numberBetween(10, 30),
            'manufacturer' => fake()->numberBetween(100000, 99999),
            'barcode'  => fake()->numberBetween(100000, 99999),
            'image_url' => fake()->numberBetween(1, 10),
            'status' => 'active'
        ];
    }
}
