<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class SessionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Start the session
        if (!Session::isStarted()) {
            Session::start();
        }

        // Log session start
        Log::info('[Session] Session started', ['session_id' => Session::getId()]);

        // Retrieve data from session
        $user = Session::get('user');
        if ($user) {
            Log::info('[Session] User retrieved from session', ['user' => $user]);
        } else {
            Log::info('[Session] No user in session');
        }

        // Proceed with the request
        $response = $next($request);

        // Save session data
        Session::save();

        // Log session save
        Log::info('[Session] Session saved', ['session_id' => Session::getId()]);

        return $response;
    }
}
