<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\JWTService;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    private JWTService $jwtService;

    public function __construct(JWTService $jwtService)
    {
        $this->jwtService = $jwtService;
    }

    public function index(RegisterRequest $request)
    {
        $user = User::create($request->all());
        $token = JWTAuth::fromUser($user);
        return response()->json($this->jwtService->respondWithToken($token));
    }
}
