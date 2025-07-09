<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{

    protected $except = [
        'auth/digio-login/*',
    ];
    public function handle(Request $request, Closure $next): Response
    {

        // if (!session()->has('user')) {
        //     return redirect()->away('https://digio.pgn.co.id');
        // }
        return $next($request);
    }
}
