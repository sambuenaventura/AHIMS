<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class VerifyPassword
{
    public function handle($request, Closure $next)
    {
        $password = $request->input('password');

        if (!Auth::check() || !Hash::check($password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password.');
        }

        return $next($request);
    }
}
