<?php

namespace App\Models;

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
        'tanggal_selesai',
        'latitude',
        'longitude',
        'trailer',
        'harga_tiket',
        'status',
    ];
}
