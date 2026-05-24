<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\PengajuanSewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PengajuanSewaController extends Controller
{
    public function create($id)
    {
        $kamar = Kamar::where('id', $id)->where('status', 'tersedia')->firstOrFail();
        $userLogedIn = Auth::user();
        $sekarang = Carbon::now();
        $targetJuniTahunIni = Carbon::create($sekarang->year, 6, 1, 0, 0, 0);

        if ($sekarang->greaterThan($targetJuniTahunIni)) {
            $tanggalMulaiOtomatis = $targetJuniTahunIni->addYear()->format('Y-m-d');
        } else {
            $tanggalMulaiOtomatis = $targetJuniTahunIni->format('Y-m-d');
        }

        return view('ajukan-sewa', compact('kamar', 'tanggalMulaiOtomatis', 'userLogedIn'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nama'            => 'required|string|max:255',
            'no_hp'           => 'required|string|max:20',
            'kontak_darurat'  => 'required|string|max:20',
            'alamat'          => 'required|string',
            'ktp_dokumen'     => 'required_without:user_ktp|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'surat_komitmen'  => 'required_without:user_komitmen|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $kamar = Kamar::where('id', $id)->where('status', 'tersedia')->firstOrFail();
        $user = Auth::user();

        $pengajuanLama = PengajuanSewa::where('user_id', $user->id)
                                        ->where('kamar_id', $kamar->id)
                                        ->where('status', 'pending')
                                        ->first();

        if ($pengajuanLama) {
            return redirect('/pembayaran/' . $pengajuanLama->order_id)
                ->with('success', 'Anda sudah memiliki pengajuan aktif untuk kamar ini. Silakan lanjutkan pembayaran dengan Order ID: ' . $pengajuanLama->order_id);
        }
        // ------------------------------------------------

        $towerLower = strtolower($kamar->tower);
        $kodeTower = 'GJL';

        if (str_contains($towerLower, 'genap') || str_contains($towerLower, 'gnp')) {
            $kodeTower = 'GNP';
        } elseif (str_contains($towerLower, 'ganjil') || str_contains($towerLower, 'gjl')) {
            $kodeTower = 'GJL';
        }

        do {
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $orderId = "KRB-{$kodeTower}-{$randomNumber}";
            $exists = PengajuanSewa::where('order_id', $orderId)->exists();
        } while ($exists);

        $sekarang = Carbon::now();
        $targetJuniTahunIni = Carbon::create($sekarang->year, 6, 1, 0, 0, 0);

        if ($sekarang->greaterThan($targetJuniTahunIni)) {
            $tanggalMulai = $targetJuniTahunIni->addYear()->format('Y-m-d');
        } else {
            $tanggalMulai = $targetJuniTahunIni->format('Y-m-d');
        }

        // --- PROSES DOKUMEN KTP ---
        $ktpPath = $user->ktp_dokumen;
        if ($request->hasFile('ktp_dokumen')) {
            // Hapus berkas fisik lama KTP milik user jika ada
            if ($user->ktp_dokumen) {
                $oldKtpPath = public_path($user->ktp_dokumen);
                if (File::exists($oldKtpPath)) {
                    File::delete($oldKtpPath);
                }
            }

            $fileKtp = $request->file('ktp_dokumen');
            $ktpName = time() . '-ktp.' . $fileKtp->getClientOriginalExtension();
            $fileKtp->move(public_path('documents/ktp'), $ktpName);
            $ktpPath = '/documents/ktp/' . $ktpName;
        }

        // --- PROSES SURAT KOMITMEN ---
        $suratPath = $user->surat_komitmen;
        if ($request->hasFile('surat_komitmen')) {
            // Hapus berkas fisik lama Surat Komitmen milik user jika ada
            if ($user->surat_komitmen) {
                $oldSuratPath = public_path($user->surat_komitmen);
                if (File::exists($oldSuratPath)) {
                    File::delete($oldSuratPath);
                }
            }

            $fileSurat = $request->file('surat_komitmen');
            $suratName = time() . '-komitmen.' . $fileSurat->getClientOriginalExtension();
            $fileSurat->move(public_path('documents/surat_komitmen'), $suratName);
            $suratPath = '/documents/surat_komitmen/' . $suratName;
        }

        // Update data profile user dasar
        $user->update([
            'ktp_dokumen'    => $ktpPath,
            'surat_komitmen' => $suratPath,
            'kontak_darurat' => $request->kontak_darurat,
            'alamat'         => $request->alamat,
        ]);

        // Simpan data pengajuan sewa baru
        PengajuanSewa::create([
            'order_id'        => $orderId,
            'user_id'         => $user->id,
            'kamar_id'        => $kamar->id,
            'tanggal_mulai'   => $tanggalMulai,
            'durasi_sewa'     => 12,
            'status'          => 'pending',
        ]);

        return redirect('/pembayaran/' . $orderId)->with('success', 'Pengajuan sewa Anda berhasil dikirim dengan Order ID: ' . $orderId);
    }

    public function show($order_id)
    {
        $pengajuan = PengajuanSewa::where('order_id', $order_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('pembayaran', compact('pengajuan'));
    }

    public function payment(Request $request, $order_id)
    {
        $request->validate([
            'tipe_pembayaran' => 'required|in:lunas,dp',
            'bukti_transfer'  => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'tipe_pembayaran.required' => 'Silahkan pilih tipe pembayaran (Lunas / DP).',
            'bukti_transfer.required'  => 'Silahkan unggah bukti transfer terlebih dahulu.',
            'bukti_transfer.image'     => 'Bukti transfer harus berupa gambar.',
        ]);

        $pengajuan = PengajuanSewa::where('order_id', $order_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // --- PROSES BUKTI TRANSFER ---
        if ($request->hasFile('bukti_transfer')) {
            // Hapus bukti transfer lama jika user melakukan re-upload
            if ($pengajuan->bukti_transfer) {
                $oldBuktiPath = public_path($pengajuan->bukti_transfer);
                if (File::exists($oldBuktiPath)) {
                    File::delete($oldBuktiPath);
                }
            }

            $fileBukti = $request->file('bukti_transfer');
            $buktiName = time() . '-bukti.' . $fileBukti->getClientOriginalExtension();
            $fileBukti->move(public_path('images/bukti_transfer'), $buktiName);
            $buktiPath = '/images/bukti_transfer/' . $buktiName;

            $pengajuan->update([
                'sudah_bayar'     => true,
                'tipe_pembayaran' => $request->tipe_pembayaran,
                'bukti_transfer'  => $buktiPath,
            ]);

            $pengajuan->kamar->update([
                'status' => 'penuh'
            ]);
        }

        return redirect()->back()->with('success_payment', 'Bukti pembayaran berhasil diunggah.');
    }
}
