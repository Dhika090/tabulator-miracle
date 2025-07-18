<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserDigio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Container\Attributes\Auth;


class AuthController extends Controller
{
    public function loginFromDigioToken(Request $request)
    {
        $token = $request->input('token');
        $secretKey = env('DIGIO_JWT_SECRET', 'zx7xCQraOUX/PFANpi5E+dNqN4Q0QV3S8QXdQpJHHKM=');

        try {
            $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

            if (Carbon::now()->timestamp > $decoded->exp) {
                return response()->json(['error' => 'Token expired.'], 401);
            }

            $user = UserDigio::updateOrCreate(
                ['userid' => $decoded->userid],
                [
                    'display_name' => $decoded->displayName ?? null,
                    'title' => $decoded->title ?? null,
                    'group' => $decoded->group ?? null,
                    'dir' => $decoded->dir ?? null,
                    'iss' => $decoded->iss ?? null,
                    'aud' => $decoded->aud ?? null,
                    'jwt_exp' => Carbon::createFromTimestamp($decoded->exp),
                    'token' => $token,
                    'is_active' => true
                ]
            );

            if (!$user || !$user->is_active) {
                return response()->json(['error' => 'Akun tidak aktif di sistem.'], 403);
            }

            session()->put('user', [
                'username' => $user->userid,
                'nama' => $user->display_name,
                'entitas' => strtolower($user->dir),
                'group' => $user->group,
                'token' => $user->token
            ]);

            return response()
                ->json([
                    'message' => 'Login berhasil.',
                    'console' => 'Login successful',
                    'user' => $user,
                ])
                ->cookie(
                    'digio_token',
                    $token,
                    60,
                    '/',
                    null,
                    false,
                    false,
                    false,
                    'Lax'
                );

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Token tidak valid: ' . $e->getMessage(),
                'console' => 'Login failed'
            ], 403)
                ->cookie('digio_token', '', 0);
        }
    }
}
