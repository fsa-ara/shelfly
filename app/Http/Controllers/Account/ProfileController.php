<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfileInformationRequest;
use App\Http\Requests\Account\ProfileSecurityRequest;
use App\Models\Account\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('account.profile');
    }

    public function updateInformation(ProfileInformationRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Profile $profile */
        $profile = $user->profile;

        $credentials = $request->validated();

        $profile->updateOrFail($credentials);

        return back()->with([
            'status' => __('account/profile.status.success.information_updated'),
        ]);
    }

    public function updateSecurity(ProfileSecurityRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $credentials = $request->validated();

        $user->updateOrFail([
            'password' => $credentials['password'],
        ]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with([
            'status' => __('account/profile.status.success.password_updated'),
        ]);
    }

    public function delete(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->deleteOrFail();

        return redirect()->route('home')->with([
            'status' => __('account/profile.status.success.account_deleted'),
        ]);
    }
}
