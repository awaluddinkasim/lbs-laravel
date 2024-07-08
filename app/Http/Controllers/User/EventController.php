<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends BaseController
{
    public function get(): JsonResponse
    {
        return $this->jsonResponse([
            'message' => 'success',
            'events' => Event::orderBy(['status', 'tanggal_mulai'])->get()
        ], 200);
    }
}
