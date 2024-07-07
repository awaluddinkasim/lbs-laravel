<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function redirect(string $redirectTo, array $response): RedirectResponse
    {
        return redirect($redirectTo)->with(
            $response['status'],
            $response['message']
        );
    }
}
