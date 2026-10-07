<?php

namespace Tests\Feature\Account;

use App\Models\Account\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_modify_their_informations_with_valid_credentials(): void
    {
        $user = User::factory()
            ->has(Profile::factory())
            ->create();

        $this->actingAs($user);

        $username = 'Joe';
        $locale = 'en_US';

        $response = $this->post(route('profile.update.informations'), [
            'username' => $username,
            'locale' => $locale,
        ]);

        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'username' => $username,
            'locale' => $locale,
        ]);

        $response->assertRedirect();
    }

    public function test_user_cannot_modify_their_informations_with_invalid_credentials(): void
    {
        $user = User::factory()
            ->has(Profile::factory())
            ->create();

        $this->actingAs($user);

        $username = 'J';
        $locale = 'en';

        $responseUsername = $this->post(route('profile.update.informations'), [
            'username' => $username,
        ]);

        $responseUsername->assertRedirectBackWithErrors('username');

        $responseLocale = $this->post(route('profile.update.informations'), [
            'locale' => $locale,
        ]);

        $responseLocale->assertRedirectBackWithErrors('locale');
    }

    public function test_user_can_modify_their_password_with_valid_credentials(): void
    {
        $currentPassword = 'buhriz-geZku4-tyvjud';
        $newPassword = 'hedqyc-6rukwu-godhaC';

        $user = User::factory()
            ->has(Profile::factory())
            ->create([
                'password' => $currentPassword,
            ]);

        $this->actingAs($user);

        $response = $this->post(route('profile.update.security'), [
            'current_password' => $currentPassword,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $this->assertTrue(Hash::check($newPassword, $user->password));

        $response->assertRedirect();
    }

    public function test_user_cannot_modify_their_password_with_invalid_credentials(): void
    {
        $currentPassword = 'buhriz-geZku4-tyvjud';
        $newPassword = 'hedqyc-6rukwu-godhaC';

        $user = User::factory()
            ->has(Profile::factory())
            ->create([
                'password' => $currentPassword,
            ]);

        $this->actingAs($user);


        $responseCurrentPassword = $this->post(route('profile.update.security'), [
            'current_password' => str_shuffle($currentPassword),
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $responseCurrentPassword->assertRedirectBackWithErrors('current_password');

        $responseNewPassword = $this->post(route('profile.update.security'), [
            'current_password' => $currentPassword,
            'password' => $newPassword,
            'password_confirmation' => str_shuffle($newPassword),
        ]);

        $responseNewPassword->assertRedirectBackWithErrors('password');
    }

    public function test_user_can_delete_their_profile(): void
    {
        $user = User::factory()
            ->has(Profile::factory())
            ->create();

        $this->actingAs($user);

        $response = $this->post(route('profile.delete'));

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);

        $this->assertDatabaseMissing('profiles', [
            'user_id' => $user->id,
        ]);

        $response->assertRedirect();
    }
}
