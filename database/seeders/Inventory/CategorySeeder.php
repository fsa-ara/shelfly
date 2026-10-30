<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\Category;
use App\Models\Inventory\CategoryTranslation;
use App\Models\Inventory\Product;
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
            ->has(CategoryTranslation::factory(), 'translations')
            ->create();
    }
}
