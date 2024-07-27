<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => 'ORD' . fake()->numberBetween(10000, 99999),
            'customer_id' => fake()->numberBetween(1, 10),
            'status' => 'Delivered',
            'total_amount' => fake()->numberBetween(10000, 99999),
            'shipping_address' => fake()->address(),
            'billing_address' => fake()->address(),
            'payment_method' => 'Cash',
            'payment_status' => 'Paid',
            'shipping_method' => 'Bike',
            'shipping_cost' => fake()->numberBetween(10, 100),
            'discount_amount' => fake()->numberBetween(10, 100),
            'tax_amount' => fake()->numberBetween(10, 100),
            'notes' => fake()->sentence(),
            'transaction_id' => 'TR' . fake()->numberBetween(10000, 99999),
            'delivery_date' => fake()->date('Y-m-d', 'now')
        ];
    }
}
