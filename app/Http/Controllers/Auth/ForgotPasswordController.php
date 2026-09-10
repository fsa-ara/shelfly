<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.auth.forgot-password');
    }

    public function send(ForgotPasswordRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $status = Password::sendResetLink($credentials);

        if ($status === Password::ResetLinkSent) {
            $request->session()->put('forgot_password_email', $credentials['email']);

            return back()->with([
                'status' => __($status),
            ]);
        }

        return back()->withErrors([
            'email' => __($status),
        ]);
    }
}
