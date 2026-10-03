<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_request_reset_link_with_valid_email(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
            ]);

        Notification::fake();

        $response = $this->post(route('password.email'), [
            'email' => $user->email,
        ]);

        Notification::assertSentTo($user, ResetPassword::class);

        $response->assertRedirectBack();
    }

    public function test_user_cannot_request_reset_link_with_invalid_email(): void
    {
        $user = User::factory()
            ->create([
                'email' => 'john.doe@icloud.com',
            ]);

        $response = $this->post(route('password.email'), [
            'email' => str_replace('icloud', 'example', $user->email),
        ]);

        $response->assertRedirectBackWithErrors('email');
    }
}
