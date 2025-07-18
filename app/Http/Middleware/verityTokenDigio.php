<?php

namespace App\Http\Middleware;

use App\Models\UserDigio;
use Carbon\Carbon;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
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
        $token = $request->query('token');

        if (!$token && !session()->has('digio_token')) {
            return redirect()->away('https://digio.pgn.co.id');
        }

        try {
            $secretKey = env('DIGIO_JWT_SECRET', 'zx7xCQraOUX/PFANpi5E+dNqN4Q0QV3S8QXdQpJHHKM=');

            if ($token) {
                $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
                $expTime = Carbon::createFromTimestamp($decoded->exp);

                // Simpan token dan data user di session
                session()->put('digio_token', $token);
                session()->put('digio_token_exp', $expTime);

                UserDigio::updateOrCreate(
                    ['userid' => $decoded->userid],
                    [
                        'display_name' => $decoded->displayName ?? null,
                        'title' => $decoded->title ?? null,
                        'group' => $decoded->group ?? null,
                        'dir' => $decoded->dir ?? null,
                        'iss' => $decoded->iss ?? null,
                        'aud' => $decoded->aud ?? null,
                        'jwt_exp' => $expTime,
                        'token' => $token,
                        'is_active' => true
                    ]
                );

                if (!session()->has('token_cleaned')) {
                    session()->put('token_cleaned', true);
                    return redirect($request->url());
                }
            }

            // Cek expired token di session
            $tokenExp = session()->get('digio_token_exp');
            if ($tokenExp && Carbon::now()->gt($tokenExp)) {
                session()->flush(); // Hapus semua session
                return redirect()->away('https://digio.pgn.co.id')->with('error', 'Token expired.');
            }

            return $next($request);

        } catch (\Exception $e) {
            session()->flush();
            return redirect()->away('https://digio.pgn.co.id')->with('error', 'Token tidak valid: ' . $e->getMessage());
        }
    }

    // public function handle($request, Closure $next)
    // {
    //     $token = $request->query('token');

    //     // Log awal masuk ke middleware
    //     Log::info('[AUTH DIGIO] Memulai pemeriksaan token...');

    //     if (!$token) {
    //         Log::warning('[AUTH DIGIO] Token tidak ditemukan dalam query.');
    //         return response()->json(['error' => 'Token tidak ditemukan.'], 400);
    //     }

    //     try {
    //         $secretKey = env('DIGIO_JWT_SECRET', 'zx7xCQraOUX/PFANpi5E+dNqN4Q0QV3S8QXdQpJHHKM=');
    //         $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

    //         Log::info('[AUTH DIGIO] Token berhasil didecode.', ['decoded' => (array) $decoded]);

    //         // Cek apakah token sudah expired
    //         if (Carbon::now()->timestamp > $decoded->exp) {
    //             Log::warning('[AUTH DIGIO] Token sudah expired.', ['expired_at' => $decoded->exp]);
    //             return response()->json(['error' => 'Token expired.'], 401);
    //         }

    //         // Simpan/update user ke database
    //         $user = UserDigio::updateOrCreate(
    //             ['userid' => $decoded->userid],
    //             [
    //                 'display_name' => $decoded->displayName ?? null,
    //                 'title' => $decoded->title ?? null,
    //                 'group' => $decoded->group ?? null,
    //                 'dir' => $decoded->dir ?? null,
    //                 'iss' => $decoded->iss ?? null,
    //                 'aud' => $decoded->aud ?? null,
    //                 'jwt_exp' => Carbon::createFromTimestamp($decoded->exp),
    //                 'token' => $token,
    //                 'is_active' => true
    //             ]
    //         );

    //         Log::info('[AUTH DIGIO] Data user diperbarui atau dibuat.', ['user' => $user->toArray()]);

    // if ($request->query('token') && !session()->has('token_cleaned')) {
    //     session()->put('token_cleaned', true);
    //     $cleanUrl = $request->url();
    //     return redirect($cleanUrl);
    // }

    //         Log::info('[AUTH DIGIO] Middleware selesai, lanjut ke request berikutnya.');
    //         return $next($request);
    //     } catch (\Exception $e) {
    //         Log::error('[AUTH DIGIO] Gagal mendecode token.', ['message' => $e->getMessage()]);
    //         return response()->json(['error' => 'Token tidak valid: ' . $e->getMessage()], 400);
    //     }
    // }

}
