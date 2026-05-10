@extends('admin.layout')

@section('page-title', 'Edit Maintenance')
@section('page-subtitle', 'Perbarui data perbaikan kamar yang sedang diproses admin.')

@section('content')

<style>
    .maintenance-form-page {
        display: grid;
        gap: 22px;
    }

    .maintenance-form-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .maintenance-form-head {
        margin-bottom: 24px;
    }

    .maintenance-form-head h2 {
        margin: 0;
        color: #211713;
        font-size: 27px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .maintenance-form-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
        max-width: 620px;
    }

    .maintenance-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .maintenance-form-full {
        grid-column: 1 / -1;
    }

    .maintenance-form-group label {
        display: block;
        margin-bottom: 8px;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .maintenance-form-group input,
    .maintenance-form-group select,
    .maintenance-form-group textarea {
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

    .maintenance-form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    .maintenance-form-group input:focus,
    .maintenance-form-group select:focus,
    .maintenance-form-group textarea:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .maintenance-form-hint {
        display: block;
        margin-top: 7px;
        color: #9a8d85;
        font-size: 12px;
        line-height: 1.5;
    }

    .maintenance-upload-box {
        border: 1px dashed #dca999;
        background: #fbf5f1;
        border-radius: 18px;
        padding: 18px;
    }

    .maintenance-upload-box input {
        width: 100%;
        border: 1px solid #eee1da;
        background: #ffffff;
        border-radius: 12px;
        padding: 11px;
        font-size: 13px;
        font-family: inherit;
    }

    .maintenance-current-file {
        margin-top: 8px;
        color: #86766f;
        font-size: 12px;
        line-height: 1.5;
    }

    .maintenance-form-actions {
        margin-top: 24px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .maintenance-form-actions .btn {
        min-width: 120px;
    }

    @media (max-width: 900px) {
        .maintenance-form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 520px) {
        .maintenance-form-panel {
            padding: 22px;
        }

        .maintenance-form-head h2 {
            font-size: 24px;
        }

        .maintenance-form-actions {
            display: grid;
            grid-template-columns: 1fr;
        }

        .maintenance-form-actions .btn {
            width: 100%;
        }
    }
</style>

<div class="maintenance-form-page">
    <div class="maintenance-form-panel">

        <div class="maintenance-form-head">
            <h2>Form Edit Maintenance</h2>
            <p>Ubah data kamar, keluhan, biaya, status pengerjaan, dan catatan perbaikan.</p>
        </div>

        <form action="/admin/maintenance/update" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="maintenance-form-grid">

                <div class="maintenance-form-group">
                    <label>Kamar</label>
                    <select name="kamar">
                        <option value="01">Kamar 01 · Tower Ganjil</option>
                        <option value="02">Kamar 02 · Tower Genap</option>
                        <option value="03" selected>Kamar 03 · Tower Ganjil</option>
                        <option value="04">Kamar 04 · Tower Genap</option>
                        <option value="08">Kamar 08 · Tower Genap</option>
                        <option value="12">Kamar 12 · Tower Genap</option>
                    </select>
                </div>

                <div class="maintenance-form-group">
                    <label>Status Maintenance</label>
                    <select name="status">
                        <option value="menunggu">Menunggu</option>
                        <option value="proses" selected>Dalam Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

                <div class="maintenance-form-group">
                    <label>Jenis Perbaikan</label>
                    <input type="text" name="jenis_perbaikan" value="Perbaikan AC">
                </div>

                <div class="maintenance-form-group">
                    <label>Biaya</label>
                    <input type="text" name="biaya" value="Rp 500.000">
                    <span class="maintenance-form-hint">Nanti saat backend, nilai ini bisa disimpan sebagai angka: 500000.</span>
                </div>

                <div class="maintenance-form-group">
                    <label>Tanggal Laporan</label>
                    <input type="date" name="tanggal_laporan" value="2026-06-12">
                </div>

                <div class="maintenance-form-group">
                    <label>Estimasi Selesai</label>
                    <input type="date" name="estimasi_selesai" value="2026-06-14">
                </div>

                <div class="maintenance-form-full maintenance-form-group">
                    <label>Keluhan / Kerusakan</label>
                    <textarea name="keluhan">AC kamar tidak dingin dan perlu dicek oleh teknisi.</textarea>
                </div>

                <div class="maintenance-form-full maintenance-form-group">
                    <label>Catatan Admin</label>
                    <textarea name="catatan_admin">Teknisi sudah dijadwalkan untuk melakukan pengecekan AC.</textarea>
                </div>

                <div class="maintenance-form-full maintenance-form-group">
                    <label>Foto Kerusakan / Bukti Perbaikan</label>
                    <div class="maintenance-upload-box">
                        <input type="file" name="foto_maintenance" accept="image/*">
                        <div class="maintenance-current-file">
                            File saat ini: maintenance_kamar_03.jpg
                        </div>
                    </div>
                </div>

            </div>

            <div class="maintenance-form-actions">
                <button type="submit" class="btn">Update</button>
                <a href="/admin/maintenance" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
</div>

@endsection