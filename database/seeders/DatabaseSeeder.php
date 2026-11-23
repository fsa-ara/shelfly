<?php

namespace Database\Seeders;

use Database\Seeders\Inventory\CategorySeeder;
use Database\Seeders\Inventory\InventorySeeder;
use Database\Seeders\Inventory\ProductSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            InventorySeeder::class,
        ]);
    }
}
