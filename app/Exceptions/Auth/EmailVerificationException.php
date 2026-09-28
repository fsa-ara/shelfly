<?php

namespace App\Exceptions\Auth;

use Exception;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

class EmailVerificationException extends Exception
{
    public function handleThrottle(ThrottleRequestsException $e, Request $request): RedirectResponse|null
    {
        if ($request->routeIs('verification.send')) {
            return back()->withErrors([
                'email' => 'Too many attempts to resend the verification email. Please wait before trying again.',
            ]);
        }

        return null;
    }

    public function handleInvalidSignature(InvalidSignatureException $e, Request $request): RedirectResponse|null
    {
        if ($request->routeIs('verification.verify')) {
            return redirect()->route('verification.notice')->withErrors([
                'email' => 'The verification link is no longer valid. Please request a new verification email.',
            ]);
        }

        return null;
    }
}
