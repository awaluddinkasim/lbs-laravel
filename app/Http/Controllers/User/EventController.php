<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function get()
    {
        return response()->json([
            'message' => 'success',
            'events' => Event::orderBy(['status', 'tanggal_mulai'])->get()
        ], 200);
    }
}
