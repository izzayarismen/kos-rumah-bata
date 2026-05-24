<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSewa extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_sewas';

    protected $fillable = [
        'order_id',
        'user_id',
        'kamar_id',
        'nama',
        'ktp_dokumen',
        'no_hp',
        'kontak_darurat',
        'alamat',
        'surat_komitmen',
        'tanggal_mulai',
        'durasi_sewa',
        'catatan',
        'status',
        'sudah_bayar',
        'bukti_transfer',
        'tipe_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}
