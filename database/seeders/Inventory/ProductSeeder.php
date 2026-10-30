<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\Category;
use App\Models\Inventory\CategoryTranslation;
use App\Models\Inventory\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
            ->for(Category::factory())
            ->create([
                'category_id' => 1,
            ]);
    }
}
