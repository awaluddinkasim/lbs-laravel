<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends BaseController
{
    public function login(): View
    {
        return view('auth');
    }


    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->remember ? true : false;

        if (auth()->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->indended();
        }

        return $this->redirectWithInput(back(), $request->all(), [
            'status' => 'error',
            'message' => 'Email atau Password salah!'
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();

        auth()->logout();

        return $this->redirect(route('login'), [
            'status' => 'success',
            'message' => 'Logout berhasil'
        ]);
    }
}
