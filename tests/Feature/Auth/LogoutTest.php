<?php

namespace Tests\Feature\Auth;

use App\Models\Account\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_logout(): void
    {
        $user = User::factory()
            ->has(Profile::factory())
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $response = $this->post(route('logout.deauthenticate'));

        $this->assertGuest();

        $response->assertRedirect();
    }
}
