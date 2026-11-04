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
                'barcode' => '3033710074525',
                'brand' => 'NESCAFÉ',
                'name' => 'Café instantané, special filtre',
                'unit_count' => 1,
                'measure_value' => 200,
                'measure_unit' => 'g',
            ]);
    }
}
