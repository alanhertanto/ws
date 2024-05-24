<?php

namespace App\Http\Middleware;

use Closure;

class CheckClient
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'client') {
            return redirect('/')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
