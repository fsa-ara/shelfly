<?php

namespace Database\Seeders\Inventory;

use App\Models\Inventory\Inventory;
use App\Models\Inventory\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::factory()
            ->recycle(Product::all())
            ->recycle(User::all())
            ->count(50)
            ->create();
    }
}
