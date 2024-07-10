<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'lokasi' => $this->lokasi,
            'deskripsi' => $this->deskripsi,
            'tanggal_mulai' => Carbon::parse($this->tanggal_mulai)->isoFormat('DD MMMM YYYY'),
            'tanggal_selesai' => Carbon::parse($this->tanggal_selesai)->isoFormat('DD MMMM YYYY'),
            'jumlah_hari' => $this->jumlah_hari,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'trailer' => $this->trailer,
            'harga_tiket' => $this->harga_tiket,
            'poster' => $this->poster,
            'status' => $this->status,
        ];
    }
}
