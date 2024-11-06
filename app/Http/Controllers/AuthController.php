<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Services\JWTService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private JWTService $jwtService;

    public function __construct(JWTService $jwtService)
    {
        $this->jwtService = $jwtService;
    }

    public function index(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json($this->jwtService->respondWithToken($token));
        }
        throw ValidationException::withMessages([
            'email' => ['Неправильные почта или пароль']
        ]);
    }

    public function refresh()
    {
        return response()->json($this->jwtService->respondWithToken($this->guard()->refresh()));
    }

    public function user()
    {
        return new UserResource(user());
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
