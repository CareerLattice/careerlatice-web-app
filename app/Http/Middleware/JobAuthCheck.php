<?php

namespace App\Http\Middleware;

use App\Models\Job;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class JobAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company_id = Auth::user()->company->id;
        // $job = Job::where('id', $request->route('job')->id)->first();
        // dd($request->route('job')->company_id);
        if($company_id != $request->route('job')->company_id){
            abort(401);
        }

        return $next($request);
    }
}
