<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends BaseController
{
    public function get(): JsonResponse
    {
        $events = Event::orderBy('tanggal_mulai')->get();

        return $this->jsonResponse([
            'message' => 'success',
            'events' => EventResource::collection($events),
        ], 200);
    }

    public function search(Request $request): JsonResponse
    {
        $keyword = $request->get('keyword');

        $events = Event::where(function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
        })->where('status', 'aktif')->orderBy('nama')->get();

        return $this->jsonResponse([
            'message' => 'success',
            'events' => EventResource::collection($events),
        ], 200);
    }
}
