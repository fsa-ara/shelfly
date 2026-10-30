<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\CategoryTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CategoryTranslation>
 */
class CategoryTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale' => 'fr_FR',
            'name' => 'Boissons',
        ];
    }
}
