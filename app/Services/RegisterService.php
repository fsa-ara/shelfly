<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterService
{
    public function handle(array $credentials): User
    {
        return DB::transaction(function () use ($credentials) {
            $user = User::create([
                'uuid' => Str::uuid(),
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password']),
            ]);

            return $user;
        });
    }
}
