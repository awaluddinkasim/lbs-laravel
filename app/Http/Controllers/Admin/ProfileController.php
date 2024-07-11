<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends BaseController
{
    public function index(): View
    {
        return view('pages.profile');
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable'
        ]);

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $admin = Admin::find(auth()->user()->id);
        $admin->update($data);

        return $this->back([
            'status' => 'success',
            'message' => 'Profile updated successfully',
        ]);
    }
}
