<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'uuid' => fake()->unique()->uuid(),
            'barcode' => fake()->randomNumber('#############'),
            'brand' => fake()->company(),
            'name' => fake()->name(),
            'unit_count' => fake()->numberBetween(1, 50),
            'measure_value' => fake()->numberBetween(50, 1000),
            'measure_unit' => fake()->randomElement(['g', 'mL']),
        ];
    }
}
