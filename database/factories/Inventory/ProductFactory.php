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
            'barcode' => '3033710074525',
            'brand' => 'NESCAFÉ',
            'name' => 'Café instantané, special filtre',
            'unit_count' => 1,
            'measure_value' => 200,
            'measure_unit' => 'g',
        ];
    }
}
