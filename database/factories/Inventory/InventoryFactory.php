<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\Inventory;
use App\Models\Inventory\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventory>
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
            'product_id' => Product::factory(),
            'user_id' => User::factory(),
            'quantity' => fake()->numberBetween(1, 10),
            'expiration_date' => fake()->dateTimeBetween('-1 days', '+2 weeks')->format('Y-m-d'),
            'storage_area' => fake()->randomElement(['Freeze', 'Fridge', 'Pantry', 'Cupboard', null]),
        ];
    }
}
