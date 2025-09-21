<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSession
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah ada user di session
        if(!$request->session()->has('user')){
            return redirect()->route('login')->with('error','Silakan login terlebih dahulu');
        }

        return $next($request);
    }
}
