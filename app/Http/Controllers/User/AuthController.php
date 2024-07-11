<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::find(Auth::user()->id);

            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return $this->jsonResponse([
                    'message' => 'Email belum diverifikasi!'
                ], 401);
            }

            return $this->jsonResponse([
                'status' => 'success',
                'user' => $user,
                'token' => $user->createToken('authToken')->plainTextToken
            ]);
        }

        return $this->jsonResponse([
            'message' => 'Email atau Password salah!'
        ], 401);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return $this->jsonResponse([
            'status' => 'success',
            'message' => 'Logout berhasil'
        ]);
    }
}
