@extends('admin.layout')

@section('page-title', 'Edit Penghuni')
@section('page-subtitle', 'Perbarui data penghuni aktif Kos Rumah Bata.')

@section('content')

<style>
    .tenant-form-page {
        display: grid;
        gap: 22px;
    }

    .tenant-form-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .tenant-form-head {
        margin-bottom: 24px;
    }

    .tenant-form-head h2 {
        margin: 0;
        font-size: 27px;
        font-weight: 700;
        color: #211713;
        letter-spacing: -0.02em;
    }

    .tenant-form-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
    }

    .tenant-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .tenant-form-full {
        grid-column: 1 / -1;
    }

    .tenant-form-group {
        margin: 0;
    }

    .tenant-form-group label {
        display: block;
        margin-bottom: 8px;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .tenant-form-group input,
    .tenant-form-group select,
    .tenant-form-group textarea {
        width: 100%;
        border: 1px solid #ead6ce;
        border-radius: 15px;
        padding: 14px 16px;
        font-size: 14px;
        color: #211713;
        font-family: inherit;
        outline: none;
        background: #ffffff;
    }

    .tenant-form-group textarea {
        min-height: 115px;
        resize: vertical;
    }

    .tenant-form-group input:focus,
    .tenant-form-group select:focus,
    .tenant-form-group textarea:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .tenant-form-hint {
        display: block;
        margin-top: 7px;
        color: #9a8d85;
        font-size: 12px;
        line-height: 1.5;
    }

    .tenant-doc-box {
        border: 1px solid #ead6ce;
        border-radius: 20px;
        padding: 18px;
        background: #fffdfb;
    }

    .tenant-doc-title {
        margin: 0 0 14px;
        color: #211713;
        font-size: 16px;
        font-weight: 700;
    }

    .tenant-doc-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .tenant-upload {
        border: 1px dashed #dca999;
        background: #fbf5f1;
        border-radius: 18px;
        padding: 16px;
    }

    .tenant-upload label {
        display: block;
        margin-bottom: 10px;
        color: #211713;
        font-size: 13px;
        font-weight: 600;
    }

    .tenant-upload input {
        width: 100%;
        border: 1px solid #eee1da;
        background: #ffffff;
        border-radius: 12px;
        padding: 11px;
        font-size: 13px;
        font-family: inherit;
    }

    .tenant-current-file {
        margin-top: 8px;
        color: #86766f;
        font-size: 12px;
        line-height: 1.5;
    }

    .tenant-form-actions {
        margin-top: 24px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .tenant-form-actions .btn {
        min-width: 120px;
    }

    @media (max-width: 900px) {
        .tenant-form-grid,
        .tenant-doc-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 520px) {
        .tenant-form-panel {
            padding: 22px;
        }

        .tenant-form-head h2 {
            font-size: 24px;
        }

        .tenant-form-actions {
            display: grid;
            grid-template-columns: 1fr;
        }

        .tenant-form-actions .btn {
            width: 100%;
        }
    }
</style>

<div class="tenant-form-page">
    <div class="tenant-form-panel">

        <div class="tenant-form-head">
            <h2>Form Edit Penghuni</h2>
            <p>Ubah data penghuni, kamar, kontak keluarga, dan dokumen administrasi.</p>
        </div>

        <form action="/admin/penghuni/update" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="tenant-form-grid">

                <div class="tenant-form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="Nadya Putri">
                </div>

                <div class="tenant-form-group">
                    <label>Tipe Penghuni</label>
                    <select name="tipe_penghuni">
                        <option value="mahasiswi" selected>Mahasiswi</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="umum">Umum</option>
                    </select>
                </div>

                <div class="tenant-form-group">
                    <label>Kamar</label>
                    <select name="kamar">
                        <option value="01" selected>Kamar 01 · Tower Ganjil</option>
                        <option value="02">Kamar 02 · Tower Genap</option>
                        <option value="03">Kamar 03 · Tower Ganjil</option>
                        <option value="04">Kamar 04 · Tower Genap</option>
                        <option value="08">Kamar 08 · Tower Genap</option>
                        <option value="12">Kamar 12 · Tower Genap</option>
                    </select>
                    <span class="tenant-form-hint">Jika kamar diganti, status kamar lama dan kamar baru nanti bisa diatur dari backend.</span>
                </div>

                <div class="tenant-form-group">
                    <label>Status Penghuni</label>
                    <select name="status_penghuni">
                        <option value="aktif" selected>Aktif</option>
                        <option value="keluar">Sudah Keluar</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="tenant-form-group">
                    <label>No. HP / WhatsApp</label>
                    <input type="text" name="no_hp" value="0812-3456-7890">
                </div>

                <div class="tenant-form-group">
                    <label>Kontak Orang Tua</label>
                    <input type="text" name="kontak_orang_tua" value="0813-2222-1111">
                </div>

                <div class="tenant-form-group">
                    <label>Tanggal Mulai Masuk</label>
                    <input type="date" name="tanggal_masuk" value="2026-06-01">
                </div>

                <div class="tenant-form-group">
                    <label>Status Pembayaran</label>
                    <select name="status_pembayaran">
                        <option value="lunas" selected>Lunas</option>
                        <option value="dp">DP</option>
                        <option value="belum_bayar">Belum Bayar</option>
                    </select>
                </div>

                <div class="tenant-form-full tenant-form-group">
                    <label>Alamat Asal</label>
                    <textarea name="alamat_asal">Samarinda, Kalimantan Timur</textarea>
                </div>

                <div class="tenant-form-full">
                    <div class="tenant-doc-box">
                        <p class="tenant-doc-title">Dokumen Penghuni</p>

                        <div class="tenant-doc-grid">
                            <div class="tenant-upload">
                                <label>Ganti Foto KTP</label>
                                <input type="file" name="foto_ktp" accept="image/*">
                                <div class="tenant-current-file">File saat ini: ktp_nadya_putri.jpg</div>
                            </div>

                            <div class="tenant-upload">
                                <label>Ganti Surat Komitmen</label>
                                <input type="file" name="surat_komitmen" accept=".pdf,image/*">
                                <div class="tenant-current-file">File saat ini: surat_komitmen_nadya.pdf</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tenant-form-full tenant-form-group">
                    <label>Catatan Admin</label>
                    <textarea name="catatan_admin" placeholder="Tambahkan catatan internal jika diperlukan.">Data penghuni sudah lengkap dan pembayaran lunas.</textarea>
                </div>

            </div>

            <div class="tenant-form-actions">
                <button type="submit" class="btn">Update</button>
                <a href="/admin/penghuni/detail" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
</div>

@endsection