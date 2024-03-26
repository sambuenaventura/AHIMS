<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle($request, Closure $next): Response
    // {
    //     // $user = Auth::user();

    //     // if (!in_array($user->role, $roles)) {
    //     //     abort(403, 'Unauthorized action.');
    //     // }

    //     // return $next($request);
    //     if(Auth()->user()->role == 'admission') {
    //         return $next($request);
    //     }
    //     abort(401);
    // }

    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (! $request->user()) {
            abort(403, 'Unauthorized access.'); // Unauthorized if not authenticated
        }

        // Check if the user's role matches any of the allowed roles
        if (! in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized access.'); // Unauthorized if role doesn't match
        }

        // User has the required role, allow access to the route
        return $next($request);
    }

}
