<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventStored;
use App\Http\Controllers\BaseController;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class EventController extends BaseController
{
    public function list($status): View
    {
        return view('pages.event', [
            'events' => Event::where('status', $status)->get(),
        ]);
    }

    public function location($id): View
    {
        return view('pages.event.map', [
            'event' => Event::find($id),
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
            'poster' => 'required|image',
        ]);

        $event['jumlah_hari'] = convertToNumber($event['jumlah_hari']);
        $event['harga_tiket'] = convertToNumber($event['harga_tiket']);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = uniqid() . '.' . $file->extension();
            $file->move(public_path('poster'), $filename);

            $event['poster'] = $filename;
        }

        Event::create($event);

        EventStored::dispatch("Event baru tersedia: {$event['nama']}");

        return $this->redirect(route('event.list', 'aktif'), [
            'status' => 'success',
            'message' => 'Event created successfully',
        ]);
    }

    public function edit($status, $id): View
    {
        return view('pages.event.edit', [
            'event' => Event::where('status', $status)->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
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
            'poster' => 'nullable|image',
        ]);

        $event['jumlah_hari'] = convertToNumber($event['jumlah_hari']);
        $event['harga_tiket'] = convertToNumber($event['harga_tiket']);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = uniqid() . '.' . $file->extension();
            $file->move(public_path('poster'), $filename);

            $event['poster'] = $filename;
        } else {
            unset($event['poster']);
        }

        Event::where('id', $id)->update($event);

        return $this->back([
            'status' => 'success',
            'message' => 'Event updated successfully',
        ]);
    }

    public function destroy($status, $id): RedirectResponse
    {
        $event = Event::where('status', $status)->where('id', $id)->first();

        File::delete(public_path('poster/' . $event->poster));

        $event->delete();

        return $this->back([
            'status' => 'success',
            'message' => 'Event deleted successfully',
        ]);
    }
}
