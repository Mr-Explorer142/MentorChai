<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role === UserRole::Student) {
            return $next($request);
        }

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin_dashboard');
        }

        return redirect()->route('mentor_dashboard')->with('error', 'Access denied, Only Students are allowed here😢');
    }
}
