<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kamar_id',
        'title',
        'description',
        'cost',
        'status',
        'date'
    ];

    // Relasi balik ke User (Penghuni)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi balik ke Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}