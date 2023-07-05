<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request, AuthService $authService)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $token = $authService->login($request->all());

        return response()->json([
            'data' => $token
        ]);
    }

    public function user(AuthService $authService)
    {
        return response()->json([
            'data' => $authService->user()
        ]);
    }

    public function register(Request $request, AuthService $authService)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $user = $authService->registerUser($request->all());
        return response()->json([
            'data' => $user
        ]);
    }

    public function logout(AuthService $authService)
    {
        $authService->deleteAllToken(Auth::user());

        return response()->json(['message' => 'user berhasil logout']);
    }
}
