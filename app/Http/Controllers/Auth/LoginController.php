<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->boolean('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->intended()->with([
                'status' => 'auth/login.status.success',
            ]);
        }

        return back()->withErrors([
            'email' => __('auth/login.error.email'),
        ])->onlyInput('email');
    }
}
