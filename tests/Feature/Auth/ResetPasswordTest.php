<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_reset_password_with_valid_credentials(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
            ]);

        $token = Password::createToken($user);

        $response = $this->post(route('password.update', [
            'token' => $token,
            'email' => $user->email,
            'password' => 'zukvut-seTguh-vykpa8',
            'password_confirmation' => 'zukvut-seTguh-vykpa8',
        ]));

        $oldPassword = $user->password;
        $newPassword = User::query()
            ->where('id', $user->id)
            ->value('password');

        $this->assertNotSame($oldPassword, $newPassword);

        $response->assertRedirect();
    }

    public function test_user_cannot_reset_password_with_invalid_credentials(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
            ]);

        $token = Password::createToken($user);

        $responseToken = $this->post(route('password.update'), [
            'token' => str_shuffle($token),
            'email' => $user->email,
            'password' => 'zukvut-seTguh-vykpa8',
            'password_confirmation' => 'zukvut-seTguh-vykpa8',
        ]);

        $responseToken->assertRedirectBackWithErrors('email');

        $responseEmail = $this->post(route('password.update'), [
            'token' => $token,
            'email' => str_replace('icloud', '123', $user->email),
            'password' => 'zukvut-seTguh-vykpa8',
            'password_confirmation' => 'zukvut-seTguh-vykpa8',
        ]);

        $responseEmail->assertRedirectBackWithErrors('email');

        $responsePassword = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'zukvut',
            'password_confirmation' => 'zukvut',
        ]);

        $responsePassword->assertRedirectBackWithErrors('password');

        $responsePasswordConfirmation = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'zukvut-seTguh-vykpa8',
            'password_confirmation' => 'zukvut-seTguh',
        ]);

        $responsePasswordConfirmation->assertRedirectBackWithErrors('password');
    }
}
