<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_receives_verification_email_after_registration(): void
    {
        Notification::fake();

        $response = $this->post(route('register.store'), [
            'email' => 'john.doe@icloud.com',
            'password' => 'buhriz-geZku4-tyvjud',
            'password_confirmation' => 'buhriz-geZku4-tyvjud',
        ]);

        $user = User::query()
            ->where('email', 'john.doe@icloud.com')
            ->firstOrFail();

        Notification::assertSentTo($user, VerifyEmail::class);

        $response->assertRedirect();
    }

    public function test_valid_verification_link_verifies_user(): void
    {
        $user = User::factory()
            ->create([
                'email_verified_at' => null,
            ]);

        Auth::login($user);

        $url = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'uuid' => $user->uuid,
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );

        $response = $this->get($url);

        $this->assertNotNull($user->email_verified_at);

        $response->assertRedirect();
    }

    public function test_invalid_verification_link_redirects_user(): void
    {
        $user = User::factory()
            ->create([
                'email_verified_at' => null,
            ]);

        Auth::login($user);

        $url = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'uuid' => $user->uuid,
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );

        $url = substr_replace($url, '123', strpos($url, 'signature=') + strlen('signature='));

        $response = $this->get($url);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
    }

    public function test_user_can_send_email_verification(): void
    {
        $user = User::factory()
            ->create([
                'email_verified_at' => null,
            ]);

        Auth::login($user);

        Notification::fake();

        $response = $this->post(route('verification.send'));

        Notification::assertSentTo($user, VerifyEmail::class);

        $response->assertRedirect();
    }

    public function test_user_cannot_resend_email_verification_too_many_times(): void
    {
        $user = User::factory()
            ->create([
                'email_verified_at' => null,
            ]);

        Auth::login($user);

        $attempts = 0;

        do {
            $response = $this->post(route('verification.send'));

            $attempts++;
        } while ($attempts < $this->getAttempts() + 1);

        $response->assertRedirectBackWithErrors('email');
    }

    public function test_verified_user_cannot_access_email_verification_page(): void
    {
        $user = User::factory()->create();

        Auth::login($user);

        $response = $this->get(route('verification.notice'));

        $response->assertRedirect();
    }

    private function getAttempts(): int
    {
        $middlewares = Route::getRoutes()
            ->getByName('verification.send')
            ->middleware();

        $throttle = array_filter($middlewares, fn($middleware) => str_starts_with($middleware, 'throttle:'));
        $params = substr(array_values($throttle)[0], strlen('throttle:'));
        $attempts = explode(',', $params)[0];

        return (int) $attempts;
    }
}
