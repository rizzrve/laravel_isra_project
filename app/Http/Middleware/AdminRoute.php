<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated and has 'admin' privilege
        if (Auth::check() && Auth::user()->privilege === 'admin') {
            return $next($request);
        }

        // Redirect to login page if not an admin
        return redirect()->route('login');
    }
}
