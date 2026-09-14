<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.register');
    }

    public function create(RegisterRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $user = DB::transaction(function () use ($credentials) {
            $user = User::query()->create([
                'uuid' => Str::uuid(),
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]);

            return $user;
        });

        Auth::login($user);

        $request->session()->regenerate();

        event(new Registered($user));

        return redirect()->route('verification.notice')->with([
            'status' => 'Your account has been created!'
        ]);
    }
}
