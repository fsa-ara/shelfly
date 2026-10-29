<?php

use App\Exceptions\Auth\EmailVerificationException;
use App\Http\Middleware\Auth\EnsureUserIsUnverified;
use App\Http\Middleware\EnsureLocalization;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->prependToPriorityList(ThrottleRequests::class, EnsureLocalization::class);

        $middleware->alias([
            'admin' => EnsureUserIsAdmin::class,
            'localization' => EnsureLocalization::class,
            'unverified' => EnsureUserIsUnverified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $emailVerificationException = new EmailVerificationException();

        $exceptions->shouldRenderJsonWhen(
            fn(Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        $exceptions->render([$emailVerificationException, 'handleThrottle']);
        $exceptions->render([$emailVerificationException, 'handleInvalidSignature']);
    })->create();
