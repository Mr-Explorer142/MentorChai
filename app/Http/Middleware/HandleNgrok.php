<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleNgrok
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('X-Forwarded-Proto')) {
            $request->server->set('HTTPS', 'on');
        }
        return $next($request);
    }
}
