<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

use App\Http\Middleware\SetLocale;

use App\Http\Middleware\CompanyAuthCheck;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\UserAuthCheck;
use App\Http\Middleware\JobAuthCheck;
use App\Http\Middleware\JobApplicationMiddleware;
use App\Http\Middleware\EducationMiddleware;
use App\Http\Middleware\ExperienceMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global Middleware
        $middleware->web([
            SetLocale::class,
        ]);

        // Middleware Alias
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'company_auth' => CompanyAuthCheck::class,
            'admin_auth' => AdminAuth::class,
            'user_auth' => UserAuthCheck::class,
            'job_auth' => JobAuthCheck::class,
            'job_application' => JobApplicationMiddleware::class,
            'education' => EducationMiddleware::class,
            'experience' => ExperienceMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();
