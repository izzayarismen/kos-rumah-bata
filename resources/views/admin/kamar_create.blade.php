@extends('admin.layout')

@section('page-title', 'Tambah Kamar')
@section('page-subtitle', 'Tambahkan data kamar yang nantinya tampil di halaman pelanggan.')

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

    .upload-area {
        border: 1px dashed #dca999;
        background: #fbf5f1;
        border-radius: 20px;
        padding: 22px;
    }

    .upload-main {
        border: 1px dashed #dca999;
        background: #ffffff;
        border-radius: 18px;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .upload-main input {
        display: none;
    }

    .upload-label {
        cursor: pointer;
        color: #c8664a;
        font-size: 14px;
        font-weight: 600;
    }

    .upload-label span {
        display: block;
        margin-top: 6px;
        color: #9a8d85;
        font-size: 12px;
        font-weight: 400;
    }

    .photo-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
        margin-top: 14px;
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
            <h2>Form Tambah Kamar</h2>
            <p>Isi data kamar sesuai informasi yang akan tampil pada halaman pelanggan.</p>
        </div>

        <form action="/admin/kamar" method="GET" enctype="multipart/form-data">
            <div class="form-grid">

                <div class="form-group">
                    <label>Nomor Kamar</label>
                    <input type="text" name="nomor_kamar" placeholder="Contoh: 01">
                    <span class="form-hint">Gunakan format angka, misalnya 01, 02, 03.</span>
                </div>

                <div class="form-group">
                    <label>Status Kamar</label>
                    <select name="status">
                        <option value="tersedia">Tersedia</option>
                        <option value="penuh">Penuh</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tower</label>
                    <select name="tower">
                        <option value="ganjil">Tower Ganjil</option>
                        <option value="genap">Tower Genap</option>
                    </select>
                    <span class="form-hint">Tower ganjil untuk kamar Non AC.</span>
                </div>

                <div class="form-group">
                    <label>Tipe Kamar</label>
                    <select name="tipe_kamar">
                        <option value="non-ac">Non AC</option>
                        <option value="ac">AC</option>
                    </select>
                    <span class="form-hint">Tower genap untuk kamar AC.</span>
                </div>

                <div class="form-group">
                    <label>Luas Kamar</label>
                    <input type="text" name="luas" placeholder="Contoh: 3 × 3 meter">
                </div>

                <div class="form-group">
                    <label>Harga Sewa / Tahun</label>
                    <input type="text" name="harga" placeholder="Contoh: Rp 8.400.000">
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
                    <textarea name="deskripsi" placeholder="Contoh: Kamar nyaman untuk satu orang dengan fasilitas dasar lengkap."></textarea>
                </div>

                <div class="form-full">
                    <div class="upload-area">
                        <div class="upload-main">
                            <label class="upload-label">
                                Upload foto utama kamar
                                <span>Format JPG, PNG, atau WEBP</span>
                                <input type="file" name="foto_utama" accept="image/*">
                            </label>
                        </div>

                        <div class="photo-grid">
                            <div class="photo-upload">
                                <label>Foto Tambahan 1</label>
                                <input type="file" name="foto_tambahan_1" accept="image/*">
                            </div>

                            <div class="photo-upload">
                                <label>Foto Tambahan 2</label>
                                <input type="file" name="foto_tambahan_2" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Simpan</button>
                <a href="/admin/kamar" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
</div>

@endsection