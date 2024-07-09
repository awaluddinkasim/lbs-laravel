<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function back(array $response): RedirectResponse
    {
        return redirect()->back()->with(
            $response['status'],
            $response['message']
        );
    }

    public function backWithInput(array $request, array $response): RedirectResponse
    {
        return redirect()->back()->with(
            $response['status'],
            $response['message']
        )->withInput($request);
    }

    public function redirect(string $redirectTo, array $response): RedirectResponse
    {
        return redirect($redirectTo)->with(
            $response['status'],
            $response['message']
        );
    }

    public function jsonResponse(array $data, int $statusCode = 200): JsonResponse
    {
        return response()->json($data, $statusCode);
    }
}
