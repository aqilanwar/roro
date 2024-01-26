<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && Auth::user()->role === 'ADMIN'){
            return $next($request);
        }
        // return redirect ('admin/login');

        if(Auth::user() && Auth::user()->role === 'EMPLOYEE'){
            return redirect('/dashboard');
        }

        if(Auth::user() && Auth::user()->role === 'CUSTOMER'){
            return redirect('/dashboard');
        }

        abort(403, 'You are not allowed to access this page.');
    }

    
}
