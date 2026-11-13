<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\Category;
use App\Models\Inventory\CategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(10)
            ->has(CategoryTranslation::factory(), 'translations')
            ->has(
                CategoryTranslation::factory()
                    ->state([
                        'locale' => 'fr_FR',
                    ]),
                'translations'
            )
            ->create();

        Category::factory()
            ->has(
                CategoryTranslation::factory()
                    ->state([
                        'locale' => 'en_US',
                        'name' => 'Drinks',
                    ]),
                'translations'
            )
            ->has(
                CategoryTranslation::factory()
                    ->state([
                        'locale' => 'fr_FR',
                        'name' => 'Boissons',
                    ]),
                'translations'
            )
            ->create();
    }
}
