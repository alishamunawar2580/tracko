<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized. Please login.'
                ], 401);
            }

            // Normal web redirect
            return redirect()->route('login.get')->with('error', 'Please login to access this page.');
        }

        return $next($request);
    }
}
