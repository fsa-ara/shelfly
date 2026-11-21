<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
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

        if (!$user->role->admin) {
            return redirect()->intended()->with([
                'status' => [
                    'error' => 'admin.status.error',
                ],
            ]);
        }

        return $next($request);
    }
}
