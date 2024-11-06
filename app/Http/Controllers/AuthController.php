<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function index(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json($token);
        }
        throw ValidationException::withMessages([
            'email' => ['Неправильные почта или пароль']
        ]);
    }
}
