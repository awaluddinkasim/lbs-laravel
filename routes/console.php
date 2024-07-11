<?php

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    $events = Event::where('status', 'aktif')->get();

    foreach ($events as $event) {
        $tanggalSelesai = Carbon::parse($event->tanggal_selesai);

        if ($tanggalSelesai->lt(Carbon::now())) {
            $event->update([
                'status' => 'selesai',
            ]);
        }
    }
})->daily();
