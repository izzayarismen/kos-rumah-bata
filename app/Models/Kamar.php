<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    protected $fillable = [
        'nomor_kamar',
        'tower',
        'tipe_kamar',
        'harga',
        'luas',
        'fasilitas',
        'deskripsi',
        'status',
        'foto_utama',      // <-- Update
        'foto_tambahan_1',  // <-- Tambah
        'foto_tambahan_2',  // <-- Tambah
        'foto_tambahan_3'   // <-- Tambah
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'harga' => 'integer'
    ];
}
