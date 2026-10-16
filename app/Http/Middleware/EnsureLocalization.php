<?php

namespace App\Http\Middleware;

use App\Models\Account\Profile;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class EnsureLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = $request->user();

        if ($user) {
            /** @var Profile $profile */
            $profile = $user->profile;

            $locale = $profile->locale;
        } else {
            $locale = $request->getLanguages()[0];
        }

        $locale = str_replace('-', '_', $locale);

        if (in_array($locale, config('app.supported_locales'))) {
            App::setLocale(strtok($locale, '-_'));
        }

        return $next($request);
    }
}
