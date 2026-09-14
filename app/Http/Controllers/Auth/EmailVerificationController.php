<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.email-verification');
    }

    public function validate(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->intended(route('home'))->with([
            'status' => 'Your account has been verified!',
        ]);
    }

    public function resend(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $user->sendEmailVerificationNotification();

        return back()->with([
            'status' => 'The verification link has been sent!',
        ]);
    }
}
