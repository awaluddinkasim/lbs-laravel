<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'tgl_lahir' => Carbon::parse($this->tgl_lahir)->isoFormat('DD MMMM YYYY'),
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
        ];
    }
}
