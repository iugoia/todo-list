<?php

namespace App\Services;

class JWTService
{
    public function respondWithToken($token): array
    {
        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => config('jwt.ttl') * 60
        ];
    }
}
