<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $user = DB::transaction(function () use ($request, $credentials) {
            $user = User::query()->create([
                'uuid' => Str::uuid(),
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]);

            $user->userProfile()->create([
                'username' => $this->makeUserName(),
                'locale' => $request->getPreferredLanguage(),
            ]);

            return $user;
        });

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended()->with([
            'status' => 'Your account has been created!',
        ]);
    }

    private function makeUserName(): string
    {
        do {
            $userName = fake()->word() . fake()->numerify('###');
        } while (strlen($userName) !== 9);

        return $userName;
    }
}
