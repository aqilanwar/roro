<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class IsCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && Auth::user()->role === 'CUSTOMER'){
            return $next($request);
        }

        if(Auth::user() && Auth::user()->role === 'ADMIN'){
            return redirect('/dashboard');
        }

        if(Auth::user() && Auth::user()->role === 'EMPLOYEE'){
            return redirect('/dashboard');
        }
        
        return redirect()->route('login')->with('intended_url', route('view.cart'));

    }
}
