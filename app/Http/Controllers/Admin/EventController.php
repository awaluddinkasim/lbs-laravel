<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends BaseController
{
    public function list($status): View
    {
        return view('pages.event');
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

        if ($event['jumlah_hari'] > 1) {
            $event['tanggal_selesai'] = Carbon::parse($event['tanggal_mulai'])->addDays($event['jumlah_hari'] - 1);
        } else {
            $event['tanggal_selesai'] = Carbon::parse($event['tanggal_mulai']);
        }

        Event::create($event);

        return $this->redirect(route('event.list', 'aktif'), [
            'status' => 'success',
            'message' => 'Event created successfully',
        ]);
    }
}
