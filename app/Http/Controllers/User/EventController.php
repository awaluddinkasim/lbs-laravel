<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends BaseController
{
    public function get(): JsonResponse
    {
        return $this->jsonResponse([
            'message' => 'success',
            'events' => EventResource::collection(Event::orderBy(['status', 'tanggal_mulai'])->get()),
        ], 200);
    }
}
