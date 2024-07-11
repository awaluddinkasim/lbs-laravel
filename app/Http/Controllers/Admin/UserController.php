<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends BaseController
{
    public function index(): View
    {
        return view('pages.users', [
            'users' => User::all(),
        ]);
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        User::destroy($user->id);

        return $this->back([
            'status' => 'success',
            'message' => 'User deleted successfully',
        ]);
    }
}
