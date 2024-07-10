<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'tanggal_mulai',
        'jumlah_hari',
        'latitude',
        'longitude',
        'trailer',
        'harga_tiket',
        'poster',
        'status',
    ];

    protected $appends = ['tanggal_selesai'];

    public function tanggalSelesai(): Attribute
    {
        return new Attribute(
            get: fn () => Carbon::parse($this->attributes['tanggal_mulai'])->addDays($this->attributes['jumlah_hari'] - 1),
        );
    }
}
