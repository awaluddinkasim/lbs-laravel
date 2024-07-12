<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.dashboard', [
            'totalEvents' => Event::all()->count(),
            'eventsAktif' => Event::where('status', 'aktif')->get()->count(),
            'eventsSelesai' => Event::where('status', 'selesai')->get()->count(),
            'users' => User::all()->count(),
        ]);
    }
}
