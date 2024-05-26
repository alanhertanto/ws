<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Log;
class CheckClient
{
    public function handle($request, Closure $next)
    {
        Log::info('Executing CheckClient middleware');
        if (Auth::check()) {
            if (Auth::user()->role !== "null") {
                if (Auth::user()->role == "Client") {
                    return $next($request);
                }else if(Auth::user()->role == "Freelancer") {
                    return redirect('/')->with('error', 'Anda Bukan Client!');
                }
            }
        }
        return redirect('/login')->with('error', 'Anda Harus Login Terlebih Dahulu!');

    }
}
