<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.register');
    }

    public function create(RegisterRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        DB::transaction(function () use ($credentials) {
            User::query()->create([
                'uuid' => Str::uuid(),
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]);
        });

        return redirect()->route('auth.login');
    }
}
