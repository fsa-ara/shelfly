<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationController extends Controller
{
    public function index(Request $request): View | RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('home'))->with([
                'status' => __('pages/auth/email-verification.status.already_verified'),
            ]);
        }

        return view('pages.auth.email-verification');
    }

    public function validate(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->intended(route('home'))->with([
            'status' => __('pages/auth/email-verification.status.verified'),
        ]);
    }

    public function resend(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $user->sendEmailVerificationNotification();

        return back()->with([
            'status' => __('pages/auth/email-verification.status.resent'),
        ]);
    }
}
