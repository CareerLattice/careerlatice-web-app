<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use \App\Http\Middleware\SetLocale;
use \App\Http\Middleware\UserAuthCheck;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global Middleware
        // $middleware->append(SetLocale::class);
        $middleware->alias([
            // 'locale', SetLocale::class
            'user_auth' => UserAuthCheck::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();
