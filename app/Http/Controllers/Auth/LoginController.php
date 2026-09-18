<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->boolean('remember-me'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with([
                'status' => __('pages/auth/login.status.logged_in'),
            ]);
        }

        return back()->withErrors([
            'email' => __('pages/auth/login.error.credentials'),
        ])->onlyInput('email');
    }
}
