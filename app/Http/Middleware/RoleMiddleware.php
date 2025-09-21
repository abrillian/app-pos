<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->session()->get('user');

        // kalau belum login atau level tidak sesuai
        if (!$user || !in_array($user['level'], $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
