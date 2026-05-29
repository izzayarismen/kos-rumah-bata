@extends('admin.layout')

@section('content')

<div class="topbar">
    <h2>Tambah Maintenance</h2>
</div>

<div class="section">
    @if ($errors->any())
        <div style="background: #fde8e8; border: 1px solid #f8b4b4; color: #9b1c1c; padding: 16px; border-radius: 16px; margin-bottom: 20px; font-weight: 600;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/maintenance" method="POST">
        @csrf

        <div class="form-group" style="margin-bottom: 15px;">
            <label>Penghuni / Pelapor</label>
            <select name="user_id">
                <option value="">-- Pilih Penghuni --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Kamar</label>
            <select name="kamar_id">
                <option value="">-- Pilih Kamar --</option>
                @foreach($kamars as $kamar)
                    @php
                        $nomorKamar = is_numeric($kamar->nomor_kamar) ? sprintf('%02d', $kamar->nomor_kamar) : $kamar->nomor_kamar;
                    @endphp
                    <option value="{{ $kamar->id }}" {{ old('kamar_id') == $kamar->id ? 'selected' : '' }}>
                        Kamar {{ $nomorKamar }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Perbaikan</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Perbaikan AC">
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            {{-- Perbaikan dari 'Y-m-day' menjadi 'Y-m-d' --}}
            <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
        </div>

        <div class="form-group">
            <label>Biaya</label>
            <input type="number" name="cost" value="{{ old('cost', 0) }}" placeholder="Contoh: 500000" min="0">
            <small style="color: #9a8d85; display: block; margin-top: 4px;">Masukkan angka murni tanpa titik/Rp, contoh: 500000</small>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="waiting" {{ old('status') === 'waiting' ? 'selected' : '' }}>Menunggu</option>
                <option value="process" {{ old('status') === 'process' ? 'selected' : '' }}>Proses</option>
                <option value="done" {{ old('status') === 'done' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="form-group">
            <label>Catatan / Deskripsi Kerusakan</label>
            <textarea name="description" placeholder="Tuliskan detail keluhan kerusakan di sini...">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn" style="background: #c8664a; color: #ffffff; border: 1px solid #c8664a; border-radius: 15px; font-weight: 600; cursor: pointer; padding: 10px 20px; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; font-size: 14px;">Simpan</button>
        <a href="/admin/maintenance" class="btn btn-secondary">Batal</a>

    </form>
</div>

@endsection