<?php

namespace Database\Seeders;

use App\Models\Account\Profile;
use App\Models\Role;
use App\Models\User;
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
            ->has(Role::factory([
                'admin' => true,
            ]))
            ->has(Profile::factory())
            ->create([
                'email' => config('admin.email'),
                'password' => config('admin.password'),
            ]);

        User::factory()
            ->has(Role::factory())
            ->has(Profile::factory())
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);
    }
}
