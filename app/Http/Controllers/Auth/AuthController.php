<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserDigio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function digioLogin(Request $request, string $provider)
    {
        if (!in_array($provider, ['pertamina', 'pgasol', 'google'])) {
            return abort(400, 'Provider tidak dikenal.');
        }

        $endpoint = "https://digio.pgn.co.id/AuthService/account/{$provider}";

        $payload = match ($provider) {
            'google' => [
                'tokenid' => $request->input('tokenid')
            ],
            default => [
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ],
        };

        $response = Http::withHeaders([
            'Authorization' => 'Bearer zx7xCQraOUX/PFANpi5E+dNqN4Q0QV3S8QXdQpJHHKM=',
            'Accept' => 'application/json',
        ])->post($endpoint, $payload);

        if (!$response->successful() || !$response->json('AccessToken')) {
            return redirect()->back()->with('error', 'Login ke Digio gagal.');
        }

        $token = $response['AccessToken'];
        $payload = json_decode(base64_decode(explode('.', $token)[1]), true);

        $user = UserDigio::updateOrCreate(
            ['userid' => $payload['userid']],
            [
                'display_name' => $payload['displayName'],
                'title' => $payload['title'] ?? null,
                'group' => $payload['group'] ?? null,
                'dir' => $payload['dir'] ?? null,
                'iss' => $payload['iss'] ?? null,
                'aud' => $payload['aud'] ?? null,
                'jwt_exp' => Carbon::createFromTimestamp($payload['exp']),
                'token' => $token,
                'is_active' => true
            ]
        );

        session()->put('user', [
            'username' => $user->userid,
            'nama' => $user->display_name,
            'entitas' => strtolower($user->dir),
            'group' => $user->group,
            'token' => $user->token
        ]);

        return redirect('/');
    }
}
