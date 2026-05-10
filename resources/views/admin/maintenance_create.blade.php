@extends('admin.layout')

@section('content')

<div class="topbar">
    <h2>Tambah Maintenance</h2>
</div>

<div class="section">
    <form action="/admin/maintenance" method="GET">

        <div class="form-group">
            <label>Kamar</label>
            <select>
                <option>Kamar 01</option>
                <option>Kamar 03</option>
                <option>Kamar 08</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Perbaikan</label>
            <input type="text" placeholder="Contoh: Perbaikan AC">
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date">
        </div>

        <div class="form-group">
            <label>Biaya</label>
            <input type="text" placeholder="Rp 500.000">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select>
                <option>Menunggu</option>
                <option>Proses</option>
                <option>Selesai</option>
            </select>
        </div>

        <div class="form-group">
            <label>Catatan</label>
            <textarea></textarea>
        </div>

        <a href="/admin/maintenance" class="btn">Simpan</a>
        <a href="/admin/maintenance" class="btn btn-secondary">Batal</a>

    </form>
</div>

@endsection