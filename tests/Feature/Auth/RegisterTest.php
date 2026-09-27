<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_and_user_profile_are_created_after_register(): void
    {
        $response = $this->post(route('register.store'), [
            'email' => 'john.doe@icloud.com',
            'password' => 'buhriz-geZku4-tyvjud',
            'password_confirmation' => 'buhriz-geZku4-tyvjud',
        ]);

        $user = User::query()
            ->where('email', 'john.doe@icloud.com')
            ->firstOrFail();

        $this->assertDatabaseHas('user_profiles', [
            'user_id' => $user->id,
        ]);

        $response->assertRedirect();
    }

    public function test_user_cannot_register_with_invalid_credentials(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);

        $responseEmail = $this->post(route('register.store'), [
            'email' => str_replace('icloud', 'example', $user->email),
            'password' => 'buhriz-geZku4-tyvjud',
            'password_confirmation' => 'buhriz-geZku4-tyvjud',
        ]);

        $responseEmail->assertRedirectBackWithErrors('email');

        $responseUniqueEmail = $this->post(route('register.store'), [
            'email' => $user->email,
            'password' => 'buhriz-geZku4-tyvjud',
            'password_confirmation' => 'buhriz-geZku4-tyvjud',
        ]);

        $responseUniqueEmail->assertRedirectBackWithErrors('email');

        $responsePassword = $this->post(route('register.store'), [
            'email' => $user->email,
            'password' => 'buhriz',
            'password_confirmation' => 'buhriz',
        ]);

        $responsePassword->assertRedirectBackWithErrors('password');

        $responsePasswordConfirmation = $this->post(route('register.store'), [
            'email' => $user->email,
            'password' => 'buhriz-geZku4-tyvjud',
            'password_confirmation' => 'buhriz-geZku4',
        ]);

        $responsePasswordConfirmation->assertRedirectBackWithErrors('password');
    }

    public function test_user_is_authenticated_after_register(): void
    {
        $this->post(route('register.store'), [
            'email' => 'john.doe@icloud.com',
            'password' => 'buhriz-geZku4-tyvjud',
            'password_confirmation' => 'buhriz-geZku4-tyvjud',
        ]);

        $this->assertAuthenticated();
    }
}
