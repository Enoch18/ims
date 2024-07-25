<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->company()),
            'contact_person' => ucwords(fake()->name()),
            'email' => fake()->email(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'province' => fake()->city(),
            'zip_code' => fake()->postcode(),
            'website' => fake()->domainName(),
            'payment_terms' => 'mothly',
            'currency' => 'USD',
            'status' => 'active'
        ];
    }
}
