<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class CheckFreelancer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        Log::info('Executing CheckFreelancer middleware');
        if (Auth::check()) {
            if (Auth::user()->role != "null") {
                if (Auth::user()->role == "Freelancer") {
                    return $next($request);
                }else if(Auth::user()->role == "Client") {
                    return redirect('/')->with('error', 'Anda Bukan Freelancer!');
                }
            }
        }

        return redirect('/login')->with('error', 'Anda Harus Login Terlebih Dahulu!');
    }
}
