<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeen
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Use query builder update to avoid calling undefined save() on the user instance
            \App\Models\User::where('id', $user->id)->update(['last_seen_at' => now()]);
        }

        return $next($request);
    }
}
