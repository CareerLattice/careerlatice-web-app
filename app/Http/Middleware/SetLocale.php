<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // $locale = $request->session()->get('locale', config('app.locale'));
        // App::setLocale($locale);
        return $next($request);
    }
}