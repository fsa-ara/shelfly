<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated(), $request->boolean('remember-me'))) {
            $request->session()->regenerate();

            return redirect()->intended(default: route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid email address or password',
        ])->onlyInput('email');
    }
}
