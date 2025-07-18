<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class verityTokenDigio
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie('digio_token') ?? $request->query('token');
        $tokenFromQuery = $request->query('token');
        if (!$token) {
            return redirect()->away('https://digio.pgn.co.id');
        }

        try {
            $secretKey = env('DIGIO_JWT_SECRET', 'zx7xCQraOUX/PFANpi5E+dNqN4Q0QV3S8QXdQpJHHKM=');
            $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

            if (Carbon::now()->timestamp > $decoded->exp) {
                return redirect('/unauthorized')->with('error', 'Token expired.');
            }

            if (!Session::has('user')) {
                Session::put('user', [
                    'username' => $decoded->userid,
                    'nama' => $decoded->displayName ?? '',
                    'entitas' => strtolower($decoded->dir ?? ''),
                    'group' => $decoded->group ?? '',
                    'token' => $token
                ]);
            }

            if (!$request->cookie('digio_token')) {
                Cookie::queue('digio_token', $token, 60, '/');
            }

            if ($tokenFromQuery) {
                $cleanUrl = $request->url();
                return redirect($cleanUrl);
            }

            return $next($request);
        } catch (\Exception $e) {
            return redirect()->away('https://digio.pgn.co.id')->with('error', 'Token tidak valid: ' . $e->getMessage());
        }
    }

}
