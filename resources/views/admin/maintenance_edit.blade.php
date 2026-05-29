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

        @if ($errors->any())
            <div style="background: #fde8e8; border: 1px solid #f8b4b4; color: #9b1c1c; padding: 16px; border-radius: 16px; margin-bottom: 20px; font-weight: 600;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/maintenance/{{ $maintenance->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="maintenance-form-grid">

                <div class="maintenance-form-group">
                    <label>Kamar</label>
                    <select name="kamar_id">
                        @foreach($kamars as $kamar)
                            @php
                                $nomorKamar = is_numeric($kamar->nomor_kamar) ? sprintf('%02d', $kamar->nomor_kamar) : $kamar->nomor_kamar;
                            @endphp
                            <option value="{{ $kamar->id }}" {{ $maintenance->kamar_id == $kamar->id ? 'selected' : '' }}>
                                Kamar {{ $nomorKamar }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="maintenance-form-group">
                    <label>Status Maintenance</label>
                    <select name="status">
                        <option value="waiting" {{ $maintenance->status === 'waiting' ? 'selected' : '' }}>Menunggu</option>
                        <option value="process" {{ $maintenance->status === 'process' ? 'selected' : '' }}>Dalam Proses</option>
                        <option value="done" {{ $maintenance->status === 'done' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="maintenance-form-group">
                    <label>Jenis Perbaikan</label>
                    <input type="text" name="title" value="{{ old('title', $maintenance->title) }}">
                </div>

                <div class="maintenance-form-group">
                    <label>Biaya</label>
                    <input type="number" name="cost" value="{{ old('cost', $maintenance->cost) }}" min="0">
                    <span class="maintenance-form-hint">Nilai disimpan sebagai angka murni, misal: 500000</span>
                </div>

                <div class="maintenance-form-group">
                    <label>Tanggal Laporan</label>
                    <input type="date" name="date" value="{{ old('date', $maintenance->date) }}">
                </div>

                <div class="maintenance-form-group">
                    <label>Estimasi Selesai (Opsional)</label>
                    <input type="date" name="estimasi_selesai" value="{{ old('estimasi_selesai', $maintenance->estimasi_selesai ?? '') }}">
                </div>

                <div class="maintenance-form-full maintenance-form-group">
                    <label>Keluhan / Kerusakan</label>
                    <textarea name="description">{{ old('description', $maintenance->description) }}</textarea>
                </div>

                <div class="maintenance-form-full maintenance-form-group">
                    <label>Catatan Admin (Opsional)</label>
                    <textarea name="catatan_admin">{{ old('catatan_admin', $maintenance->catatan_admin ?? '') }}</textarea>
                </div>

                <div class="maintenance-form-full maintenance-form-group">
                    <label>Foto Kerusakan / Bukti Perbaikan (Opsional)</label>
                    <div class="maintenance-upload-box">
                        <input type="file" name="foto_maintenance" accept="image/*">
                        @if(!empty($maintenance->foto_maintenance))
                            <div class="maintenance-current-file">
                                File saat ini: <a href="{{ asset('images/maintenance/' . $maintenance->foto_maintenance) }}" target="_blank" style="color: #c8664a; font-weight: 600;">{{ $maintenance->foto_maintenance }}</a>
                            </div>
                        @else
                            <div class="maintenance-current-file">
                                Belum ada file foto yang diunggah.
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="maintenance-form-actions">
                <button type="submit" class="btn" style="background: #c8664a; color: #ffffff; border: 1px solid #c8664a; border-radius: 15px; font-weight: 600; cursor: pointer;">Update</button>
                <a href="/admin/maintenance" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
</div>

@endsection