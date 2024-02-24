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

    public function handle($request, Closure $next, $role)
    {
        if (! $request->user() || $request->user()->role !== $role) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }

}
