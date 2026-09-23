<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->has(UserProfile::factory())
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);
    }
}
