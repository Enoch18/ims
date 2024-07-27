<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warehouse_id' => fake()->numberBetween(1, 10),
            'code' => ucwords(fake()->word()),
            'description' => fake()->sentence(),
            'storage_type' => 'box',
            'capacity' => fake()->numberBetween(1, 100),
            'capacity' => fake()->numberBetween(1, 20),
            'parent_location_id' => null
        ];
    }
}
