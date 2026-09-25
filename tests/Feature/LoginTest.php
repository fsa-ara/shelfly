<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);

        $this->post(route('login.authenticate'), [
            'email' => $user->email,
            'password' => 'buhriz-geZku4-tyvjud',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);

        $responseEmail = $this->post(route('login.authenticate'), [
            'email' => str_replace('icloud', 'example', $user->email),
            'password' => 'buhriz-geZku4-tyvjud',
        ]);

        $this->assertGuest();

        $responsePassword = $this->post(route('login.authenticate'), [
            'email' => $user->email,
            'password' => 'xafhup-dyqdir-5cAzfu',
        ]);

        $this->assertGuest();

        foreach ([$responseEmail, $responsePassword] as $response) {
            $response->assertRedirectBackWithErrors('email');
        }
    }

    public function test_user_can_login_with_remember_me(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);

        $response = $this->post(route('login.authenticate'), [
            'email' => $user->email,
            'password' => 'buhriz-geZku4-tyvjud',
            'remember_me' => true,
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertCookie(Auth::getRecallerName());
    }

    public function test_user_can_login_without_remember_me(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);

        $response = $this->post(route('login.authenticate'), [
            'email' => $user->email,
            'password' => 'buhriz-geZku4-tyvjud',
            'remember_me' => false,
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertCookieMissing(Auth::getRecallerName());
    }

    public function test_authenticated_user_cannot_access_login_page(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
                'password' => 'buhriz-geZku4-tyvjud',
            ]);

        Auth::login($user);

        $response = $this->get(route('login'));

        $response->assertRedirect();
    }
}
