<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends BaseController
{
    public function list($status): View
    {
        return view('pages.event', [
            'events' => Event::where('status', $status)->get(),
        ]);
    }

    public function create(): View
    {
        return view('pages.event.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $event = $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'jumlah_hari' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'trailer' => 'required',
            'harga_tiket' => 'nullable',
        ]);

        $event['jumlah_hari'] = convertToNumber($event['jumlah_hari']);
        $event['harga_tiket'] = convertToNumber($event['harga_tiket']);

        Event::create($event);

        return $this->redirect(route('event.list', 'aktif'), [
            'status' => 'success',
            'message' => 'Event created successfully',
        ]);
    }
}
