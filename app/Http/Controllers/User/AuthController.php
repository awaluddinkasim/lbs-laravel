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
        if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
            $user = User::find(Auth::guard('user')->user()->id);

            if (!$user->hasVerifiedEmail()) {
                $user->sendEmailVerificationNotification();

                Auth::guard('user')->logout();
                return $this->jsonResponse([
                    'message' => 'Email belum diverifikasi, silahkan periksa email anda.'
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
