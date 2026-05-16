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
        'deskripsi', // <-- TAMBAHKAN INI
        'status',
        'foto'
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'harga' => 'integer'
    ];
}
