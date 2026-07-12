<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                Rule::email()
                    ->preventSpoofing()
                    ->rfcCompliant(strict: false)
                    ->validateMxRecord(),
            ],
            'password' => [
                'confirmed',
                'required',
                Password::min(12)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        $user = DB::transaction(function () use ($credentials) {
            $user = User::create([
                'uuid' => Str::uuid(),
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password']),
            ]);

            return $user;
        });

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
