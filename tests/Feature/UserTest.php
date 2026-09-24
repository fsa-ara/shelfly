<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_deleting_a_user_also_deletes_their_profile(): void
    {
        $user = User::factory()
            ->has(UserProfile::factory())
            ->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);

        $this->assertDatabaseHas('user_profiles', [
            'user_id' => $user->id,
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);

        $this->assertDatabaseMissing('user_profiles', [
            'user_id' => $user->id,
        ]);
    }
}
