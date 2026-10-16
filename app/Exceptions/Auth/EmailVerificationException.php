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
                'email' => __('auth/email-verification.error.throttle'),
            ]);
        }

        return null;
    }

    public function handleInvalidSignature(InvalidSignatureException $e, Request $request): RedirectResponse|null
    {
        if ($request->routeIs('verification.verify')) {
            return redirect()->route('verification.notice')->withErrors([
                'email' => __('auth/email-verification.error.invalid_signature'),
            ]);
        }

        return null;
    }
}
