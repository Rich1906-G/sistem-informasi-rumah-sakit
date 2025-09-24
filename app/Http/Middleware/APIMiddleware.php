<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class APIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!Auth::guard('accounts')->check()) {
        //     abort(403, 'Anda tidak punya akses.');
        // }

        if (!Auth::check()) {
            abort(403, 'NGAPAIN KAU KESINI KONTOLLLLLL ???!!!');
        }

        return $next($request);
    }
}
