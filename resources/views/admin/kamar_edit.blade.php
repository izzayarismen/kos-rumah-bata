@extends('admin.layout')

@section('page-title', 'Edit Kamar')
@section('page-subtitle', 'Perbarui data kamar yang tampil di halaman pelanggan.')

@section('content')

<style>
    .room-form-page {
        display: grid;
        gap: 22px;
    }

    .room-form-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .room-form-head {
        margin-bottom: 24px;
    }

    .room-form-head h2 {
        margin: 0;
        font-size: 27px;
        font-weight: 700;
        color: #211713;
        letter-spacing: -0.02em;
    }

    .room-form-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .form-full {
        grid-column: 1 / -1;
    }

    .form-group {
        margin: 0;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
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

    .form-group textarea {
        min-height: 115px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .form-hint {
        display: block;
        margin-top: 7px;
        color: #9a8d85;
        font-size: 12px;
        line-height: 1.5;
    }

    .facility-box {
        border: 1px solid #ead6ce;
        border-radius: 18px;
        padding: 16px;
        background: #fffdfb;
    }

    .facility-title {
        margin: 0 0 12px;
        font-size: 14px;
        font-weight: 600;
        color: #211713;
    }

    .facility-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
    }

    .facility-check {
        border: 1px solid #eee1da;
        background: #fbf7f3;
        border-radius: 14px;
        padding: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        color: #4b403b;
        font-size: 13px;
        font-weight: 500;
    }

    .facility-check input {
        width: 15px;
        height: 15px;
        accent-color: #c8664a;
    }

    .current-photo {
        border: 1px solid #ead6ce;
        border-radius: 20px;
        background: #fbf5f1;
        padding: 16px;
    }

    .current-photo img {
        width: 100%;
        height: 240px;
        border-radius: 16px;
        object-fit: cover;
        display: block;
        border: 1px solid #ead6ce;
        margin-bottom: 14px;
    }

    .current-photo label {
        display: block;
        margin-bottom: 9px;
        font-size: 14px;
        font-weight: 600;
        color: #211713;
    }

    .current-photo input {
        width: 100%;
        border: 1px solid #eee1da;
        border-radius: 12px;
        padding: 11px;
        font-size: 13px;
        background: #ffffff;
    }

    .photo-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .photo-upload {
        border: 1px solid #ead6ce;
        border-radius: 16px;
        padding: 14px;
        background: #ffffff;
    }

    .photo-upload label {
        display: block;
        margin-bottom: 9px;
        font-size: 13px;
        font-weight: 600;
        color: #211713;
    }

    .photo-upload input {
        width: 100%;
        border: 1px solid #eee1da;
        border-radius: 12px;
        padding: 11px;
        font-size: 13px;
    }

    .form-actions {
        margin-top: 24px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .form-actions .btn {
        min-width: 120px;
    }

    @media (max-width: 900px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .facility-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 520px) {
        .room-form-panel {
            padding: 22px;
        }

        .room-form-head h2 {
            font-size: 24px;
        }

        .facility-grid,
        .photo-grid {
            grid-template-columns: 1fr;
        }

        .current-photo img {
            height: 190px;
        }

        .form-actions {
            display: grid;
            grid-template-columns: 1fr;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
</style>

<div class="room-form-page">
    <div class="room-form-panel">

        <div class="room-form-head">
            <h2>Form Edit Kamar</h2>
            <p>Ubah data kamar sesuai informasi terbaru yang akan tampil pada halaman pelanggan.</p>
        </div>

        <form action="/admin/kamar/update" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Nomor Kamar</label>
                    <input type="text" name="nomor_kamar" value="01">
                    <span class="form-hint">Gunakan format angka, misalnya 01, 02, 03.</span>
                </div>

                <div class="form-group">
                    <label>Status Kamar</label>
                    <select name="status">
                        <option value="tersedia" selected>Tersedia</option>
                        <option value="penuh">Penuh</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tower</label>
                    <select name="tower">
                        <option value="ganjil" selected>Tower Ganjil</option>
                        <option value="genap">Tower Genap</option>
                    </select>
                    <span class="form-hint">Tower ganjil untuk kamar Non AC.</span>
                </div>

                <div class="form-group">
                    <label>Tipe Kamar</label>
                    <select name="tipe_kamar">
                        <option value="non-ac" selected>Non AC</option>
                        <option value="ac">AC</option>
                    </select>
                    <span class="form-hint">Tower genap untuk kamar AC.</span>
                </div>

                <div class="form-group">
                    <label>Luas Kamar</label>
                    <input type="text" name="luas" value="3 × 3 meter">
                </div>

                <div class="form-group">
                    <label>Harga Sewa / Tahun</label>
                    <input type="text" name="harga" value="Rp 8.400.000">
                </div>

                <div class="form-full">
                    <div class="facility-box">
                        <p class="facility-title">Fasilitas Kamar</p>

                        <div class="facility-grid">
                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="Kasur" checked>
                                Kasur
                            </label>

                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="Lemari" checked>
                                Lemari
                            </label>

                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam" checked>
                                KM Dalam
                            </label>

                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="AC">
                                AC
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-full form-group">
                    <label>Deskripsi Kamar</label>
                    <textarea name="deskripsi">Kamar nyaman untuk satu orang dengan fasilitas dasar lengkap.</textarea>
                </div>

                <div class="form-full">
                    <div class="current-photo">
                        <label>Foto Utama Saat Ini</label>

                        <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=900&q=80" alt="Foto kamar">

                        <label>Ganti Foto Utama</label>
                        <input type="file" name="foto_utama" accept="image/*">
                        <span class="form-hint">Kosongkan jika tidak ingin mengganti foto utama.</span>
                    </div>
                </div>

                <div class="form-full">
                    <div class="photo-grid">
                        <div class="photo-upload">
                            <label>Ganti Foto Tambahan 1</label>
                            <input type="file" name="foto_tambahan_1" accept="image/*">
                        </div>

                        <div class="photo-upload">
                            <label>Ganti Foto Tambahan 2</label>
                            <input type="file" name="foto_tambahan_2" accept="image/*">
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Update</button>
                <a href="/admin/kamar" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
</div>

@endsection