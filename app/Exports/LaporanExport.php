<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $transaksi;

    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function collection()
    {
        return $this->transaksi;
    }

    public function headings(): array
    {
        return [
            'ID Transaksi',
            'Tanggal',
            'Jenis',
            'Nama / Judul Transaksi',
            'Nominal (Rp)',
            'Deskripsi',
        ];
    }

    public function map($pembayaran): array
    {
        return [
            $pembayaran->id,
            date('d-m-Y', strtotime($pembayaran->tanggal_bayar)),
            ucfirst($pembayaran->jenis),
            $pembayaran->nama,
            $pembayaran->nominal,
            $pembayaran->deskripsi ?? '-',
        ];
    }
}
