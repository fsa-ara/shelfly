<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $token): View | RedirectResponse
    {
        return session()->exists('forgot_password_email')
            ? view('pages.reset-password', ['token' => $token])
            : redirect()->route('auth.forgot-password');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResetPasswordRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $status = Password::reset(
            $credentials,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(64));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PasswordReset) {
            $request->session()->forget('forgot_password_email');

            return redirect()->route('auth.login')->with([
                'status' => __($status),
            ]);
        }

        return back()->withErrors([
            'password' => __($status),
        ]);
    }
}
