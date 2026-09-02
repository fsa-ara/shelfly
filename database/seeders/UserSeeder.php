<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'john.doe@icloud.com',
            'password' => 'cenvor-woxCob-suhzu4',
        ]);
    }
}
