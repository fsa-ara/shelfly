<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function index(): View
    {
        return view('auth.forgot-password');
    }

    public function send(ForgotPasswordRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $status = Password::sendResetLink($credentials);

        return $status === Password::ResetLinkSent
            ? back()->with([
                'status' => __($status),
            ])
            : back()->withErrors([
                'email' => __($status),
            ]);
    }
}
