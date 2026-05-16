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
        position: relative;
        overflow: hidden;
    }

    .upload-main input {
        display: none;
    }

    .upload-label {
        cursor: pointer;
        color: #c8664a;
        font-size: 14px;
        font-weight: 600;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        z-index: 2;
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

        @if ($errors->any())
            <div style="padding: 14px 20px; background-color: #fce8e6; color: #c0392b; border: 1px solid #f9cfcc; border-radius: 15px; margin-bottom: 18px; font-size: 14px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/kamar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">

                <div class="form-group">
                    <label>Nomor Kamar</label>
                    <input type="text" name="nomor_kamar" placeholder="Contoh: 01" value="{{ old('nomor_kamar') }}" required>
                    <span class="form-hint">Gunakan format angka, misalnya 01, 02, 03.</span>
                </div>

                <div class="form-group">
                    <label>Status Kamar</label>
                    <select name="status">
                        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ old('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Tower</label>
                    <select name="tower">
                        <option value="Ganjil" {{ old('tower') == 'Ganjil' ? 'selected' : '' }}>Tower Ganjil</option>
                        <option value="Genap" {{ old('tower') == 'Genap' ? 'selected' : '' }}>Tower Genap</option>
                    </select>
                    <span class="form-hint">Tower ganjil untuk kamar Non AC.</span>
                </div>

                <div class="form-group">
                    <label>Tipe Kamar</label>
                    <select name="tipe_kamar">
                        <option value="non-ac" {{ old('tipe_kamar') == 'non-ac' ? 'selected' : '' }}>Non AC</option>
                        <option value="ac" {{ old('tipe_kamar') == 'ac' ? 'selected' : '' }}>AC</option>
                    </select>
                    <span class="form-hint">Tower genap untuk kamar AC.</span>
                </div>

                <div class="form-group">
                    <label>Luas Kamar</label>
                    <input type="text" name="luas" placeholder="Contoh: 3 × 3 meter" value="{{ old('luas') }}" required>
                </div>

                <div class="form-group">
                    <label>Harga Sewa / Tahun</label>
                    <input type="number" name="harga" placeholder="Contoh: 8400000" value="{{ old('harga') }}" required>
                </div>

                <div class="form-full">
                    <div class="facility-box">
                        <p class="facility-title">Fasilitas Kamar</p>

                        <div class="facility-grid">
                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="Kasur" {{ is_array(old('fasilitas')) && in_array('Kasur', old('fasilitas')) ? 'checked' : (!old('fasilitas') ? 'checked' : '') }}>
                                Kasur
                            </label>

                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="Lemari" {{ is_array(old('fasilitas')) && in_array('Lemari', old('fasilitas')) ? 'checked' : (!old('fasilitas') ? 'checked' : '') }}>
                                Lemari
                            </label>

                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="KM Dalam" {{ is_array(old('fasilitas')) && in_array('KM Dalam', old('fasilitas')) ? 'checked' : (!old('fasilitas') ? 'checked' : '') }}>
                                KM Dalam
                            </label>

                            <label class="facility-check">
                                <input type="checkbox" name="fasilitas[]" value="AC" {{ is_array(old('fasilitas')) && in_array('AC', old('fasilitas')) ? 'checked' : '' }}>
                                AC
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-full form-group">
                    <label>Deskripsi Kamar</label>
                    <textarea name="deskripsi" placeholder="Contoh: Kamar nyaman untuk satu orang dengan fasilitas dasar lengkap.">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="form-full">
                    <div class="upload-area">
                        <div class="upload-main" id="uploadMainContainer">
                            {{-- Image Element untuk Preview --}}
                            <img id="imagePreview" src="" alt="Preview" style="display: none; width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">

                            <label class="upload-label">
                                <span id="uploadLabelText">Upload foto utama kamar</span>
                                <span id="uploadHintText">Format JPG, PNG, atau WEBP</span>
                                <input type="file" name="foto" id="fotoInput" accept="image/*">
                            </label>
                        </div>

                        <div class="photo-grid">
                            <div class="photo-upload">
                                <label>Foto Tambahan 1</label>
                                <input type="file" name="foto_tambahan_1" accept="image/*" placeholder="Opsional">
                            </div>

                            <div class="photo-upload">
                                <label>Foto Tambahan 2</label>
                                <input type="file" name="foto_tambahan_2" accept="image/*" placeholder="Opsional">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn" style="border: 1px solid #c8664a; background: #c8664a; color: #ffffff; padding: 13px 18px; border-radius: 15px; font-size: 14px; font-weight: 600; cursor: pointer; font-family: inherit;">Simpan</button>
                <a href="/admin/kamar" class="btn btn-secondary" style="text-decoration: none; border: 1px solid #ead6ce; background: #fbf5f1; color: #7a5d52; padding: 13px 18px; border-radius: 15px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; font-family: inherit;">Batal</a>
            </div>
        </form>

    </div>
</div>

{{-- Skrip Preview Gambar Otomatis --}}
<script>
    document.getElementById('fotoInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const labelText = document.getElementById('uploadLabelText');
        const hintText = document.getElementById('uploadHintText');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Tampilkan gambar preview

                // Ubah teks label menjadi sedikit transparan/overlay di atas gambar jika diinginkan
                labelText.textContent = "Ganti foto utama kamar";
                labelText.style.color = "#ffffff";
                labelText.style.textShadow = "1px 1px 4px rgba(0,0,0,0.6)";
                hintText.style.display = "none";
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none';
            labelText.textContent = "Upload foto utama kamar";
            labelText.style.color = "#c8664a";
            labelText.style.textShadow = "none";
            hintText.style.display = "block";
        }
    });
</script>

@endsection
