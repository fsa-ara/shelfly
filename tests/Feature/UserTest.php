<?php

namespace Tests\Feature;

use App\Models\Account\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_deleting_a_user_also_deletes_their_profile(): void
    {
        $user = User::factory()
            ->has(Profile::factory())
            ->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);

        $this->assertDatabaseMissing('profiles', [
            'user_id' => $user->id,
        ]);
    }
}
