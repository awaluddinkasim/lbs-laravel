<?php

namespace App\Http\Controllers\User;

use App\Events\UserRegistered;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function verifyEmail(Request $request): JsonResponse
    {
        $user = User::find($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($user->markEmailAsVerified()) event(new Verified($user));

        return response()->json(['message' => 'Email verified successfully'], 200);
    }

    public function resendEmailVerification(Request $request): JsonResponse
    {
        $email = $request->get('email');

        $user = User::where('email', $email)->first();
        if ($user) {
            $user->sendEmailVerificationNotification();
        }

        return $this->jsonResponse([
            'message' => 'Link verifikasi email verification telah dikirim',
        ], 200);
    }

    public function get(Request $request): JsonResponse
    {
        return $this->jsonResponse([
            'message' => 'success',
            'user' => new UserResource($request->user()),
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'no_hp' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->jsonResponse([
                'message' => 'Input tidak valid',
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            return $this->jsonResponse([
                'message' => 'Email sudah terdaftar',
            ], 422);
        }

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->no_hp = $request->no_hp;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->save();

        UserRegistered::dispatch($user);

        return $this->jsonResponse([
            'message' => 'Berhasil mendaftar',
        ], 200);
    }

    public function update(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'no_hp' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->jsonResponse([
                'message' => 'Input tidak valid',
            ], 422);
        }

        $user = User::find($request->user()->id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->password) $user->password = Hash::make($request->password);
        $user->no_hp = $request->no_hp;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->update();

        return $this->jsonResponse([
            'message' => 'success',
            'user' => $user
        ], 200);
    }
}
