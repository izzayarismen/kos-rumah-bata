@extends('admin.layout')

@section('page-title', 'Aktivitas')
@section('page-subtitle', 'Kelola aktivitas atau informasi terbaru yang tampil di landing page pelanggan.')

@section('content')

<style>
    .activity-page {
        display: grid;
        gap: 28px;
    }

    .activity-panel {
        background: #ffffff;
        border: none;
        box-shadow: 0 1px 3px rgba(33, 23, 19, 0.03), 0 4px 20px rgba(66, 38, 22, 0.04), inset 0 0 0 1px rgba(234, 214, 206, 0.4);
        border-radius: 16px;
        padding: 28px;
    }

    .activity-head {
        margin-bottom: 24px;
    }

    .activity-head h2 {
        margin: 0;
        color: #2c221e;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .activity-head p {
        margin: 6px 0 0;
        color: #94857e;
        font-size: 14px;
        line-height: 1.6;
        max-width: 650px;
    }

    .activity-form {
        display: grid;
        gap: 18px;
        padding: 24px;
        border: none;
        box-shadow: inset 0 0 0 1px #f0e6e2;
        border-radius: 16px;
        background: #fdfcfb;
        margin-bottom: 8px;
    }

    .activity-form h3 {
        margin: 0 0 4px 0;
        color: #2c221e;
        font-size: 18px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .activity-field label {
        display: block;
        margin-bottom: 8px;
        color: #2c221e;
        font-size: 13.5px;
        font-weight: 600;
    }

    .activity-field input,
    .activity-field select,
    .activity-field textarea {
        width: 100%;
        border: 1px solid #f0e6e2;
        border-radius: 12px;
        padding: 12px 14px;
        font-size: 14px;
        color: #2c221e;
        font-family: inherit;
        outline: none;
        background: #ffffff;
        transition: all 0.2s ease;
    }

    .activity-field input[type="file"] {
        padding: 10px 12px;
        font-size: 13px;
        color: #94857e;
    }

    .activity-field textarea {
        min-height: 105px;
        resize: vertical;
        line-height: 1.6;
    }

    .activity-field input:focus,
    .activity-field select:focus,
    .activity-field textarea:focus {
        border-color: #c8664a;
        box-shadow: 0 0 0 3px rgba(200, 102, 74, 0.05);
    }

    /* FIX TERAKHIR: Formulasi Flexbox Aman dari Pengaruh Tumpukan Font Global */
    .activity-checkbox-field {
        position: relative;
        display: block; /* Diubah dari flex/grid menjadi block */
        padding: 14px 16px 14px 44px; /* Kasih space kiri sebesar 44px untuk tempat checkbox */
        background: #ffffff;
        border: 1px dashed #ead6ce;
        border-radius: 12px;
        cursor: pointer;
        user-select: none;
        min-height: 48px; /* Mengunci tinggi minimum */
    }

    .activity-checkbox-field input[type="checkbox"] {
        position: absolute;
        /* Kunci posisi di tengah-tengah container secara vertikal */
        top: 50%;
        left: 16px;
        transform: translateY(-50%); 
        
        width: 18px !important;
        height: 18px !important;
        margin: 0 !important;
        padding: 0 !important;
        accent-color: #c8664a;
        cursor: pointer;
    }

    .activity-checkbox-field p {
        margin: 0 !important;
        padding: 0 !important;
        font-size: 13.5px;
        font-weight: 600;
        color: #2c221e;
        line-height: 1.5 !important;
        text-align: left;
    }

    /* Penataan Grid Form */
    .activity-form-grid-three {
        display: grid;
        grid-template-columns: 1.2fr 1fr 1fr;
        gap: 16px;
    }

    .activity-form-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 4px;
    }

    .activity-add-btn {
        min-height: 44px;
        border-radius: 12px;
        padding: 0 24px;
        background: #c8664a;
        color: #ffffff;
        text-decoration: none;
        border: none;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        transition: background 0.2s ease;


    .activity-add-btn:hover {
        background: #b75a41;
    }

    /* Bagian Toolbar Daftar Data */
    .activity-toolbar {
        display: grid;
        grid-template-columns: minmax(260px, 420px) auto;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
    }

    .activity-search {
        width: 100%;
        height: 44px;
        border: 1px solid #f0e6e2;
        border-radius: 12px;
        padding: 0 16px;
        font-size: 13.5px;
        font-family: inherit;
        color: #2c221e;
        outline: none;
        background: #ffffff;
    }

    .activity-search:focus {
        border-color: #c8664a;
        box-shadow: 0 0 0 3px rgba(200, 102, 74, 0.05);
    }

    .activity-count {
        color: #94857e;
        font-size: 13.5px;
        white-space: nowrap;
    }

    .activity-list {
        display: grid;
        gap: 16px;
    }

    /* Item List Box */
    .activity-item {
        border: 1px solid #f0e6e2;
        border-radius: 16px;
        padding: 20px;
        background: #ffffff;
        display: grid;
        grid-template-columns: 52px 1fr auto;
        gap: 20px;
        align-items: start;
        transition: all 0.2s ease;
    }

    .activity-item:hover {
        border-color: #dfc6ba;
        box-shadow: 0 8px 24px rgba(80, 48, 31, 0.04);
        transform: translateY(-1px);
    }

    .activity-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: #fbf1ec;
        color: #c8664a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .activity-info h3 {
        margin: 0;
        color: #2c221e;
        font-size: 16.5px;
        font-weight: 700;
        letter-spacing: -0.01em;
    }

    .activity-info p {
        margin: 8px 0 0;
        color: #6e605a;
        font-size: 14px;
        line-height: 1.6;
    }

    /* Thumbnail Gambar Pendukung di List Admin */
    .activity-img-preview {
        margin-top: 12px;
        max-width: 140px;
        height: 85px;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #f0e6e2;
    }

    .activity-img-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .activity-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    .activity-badge {
        display: inline-flex;
        align-items: center;
        min-height: 26px;
        padding: 0 10px;
        border-radius: 999px;
        background: #fdfbfb;
        border: 1px solid #f0e6e2;
        color: #7a5d52;
        font-size: 12px;
        font-weight: 600;
    }

    /* Badge Khusus */
    .badge-category {
        background: #fff1d6;
        color: #b77700;
        border-color: #ffe6b3;
    }

    .badge-pinned {
        background: #ffe1dc;
        color: #c94f36;
        border-color: #ffd1ca;
    }

    .activity-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 8px;
        flex-wrap: wrap;
        align-self: center;
    }

    .activity-btn-small {
        min-height: 38px;
        border: none;
        border-radius: 10px;
        padding: 0 16px;
        font-family: inherit;
        font-size: 13.5px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s ease;
        white-space: nowrap;
    }

    .activity-edit {
        background: #c8664a;
        color: #ffffff;
    }

    .activity-edit:hover {
        background: #b75a41;
    }

    .activity-delete {
        background: #fbf1ec;
        color: #c8664a;
    }

    .activity-delete:hover {
        background: #ebcec2;
    }

    .activity-empty {
        display: none;
        text-align: center;
        padding: 40px 20px;
        border: 1px dashed #ead6ce;
        border-radius: 16px;
        background: #fdfcfb;
        color: #94857e;
        margin-top: 14px;
    }

    .activity-empty.show {
        display: block;
    }

    .activity-empty strong {
        display: block;
        color: #2c221e;
        font-size: 16px;
        margin-bottom: 6px;
    }

    @media (max-width: 900px) {
        .activity-form-grid-three,
        .activity-toolbar,
        .activity-item {
            grid-template-columns: 1fr;
        }

        .activity-actions {
            justify-content: flex-start;
            margin-top: 4px;
        }
    }

    @media (max-width: 520px) {
        .activity-panel {
            padding: 20px;
        }

        .activity-form {
            padding: 16px;
        }

        .activity-form-actions,
        .activity-actions {
            display: grid;
            grid-template-columns: 1fr;
        }

        .activity-add-btn,
        .activity-btn-small {
            width: 100%;
        }
    }
</style>

<div class="activity-page">

    <div class="activity-panel">
        <div class="activity-head">
            <div>
                <h2>Kelola Aktivitas</h2>
                <p>Atur informasi aktivitas, pengumuman, atau update terbaru yang akan tampil di landing page pelanggan.</p>
            </div>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" class="activity-form">
            @csrf

            <h3>Tambah Aktivitas Baru</h3>

            <div class="activity-field">
                <label>Judul Aktivitas</label>
                <input type="text" name="title" placeholder="Contoh: Promo khusus penghuni baru bulan ini">
            </div>

            <div class="activity-field">
                <label>Deskripsi</label>
                <textarea name="description" placeholder="Tulis deskripsi ringkas atau teks pengumuman yang akan dibaca oleh pelanggan..."></textarea>
            </div>

            <div class="activity-form-grid-three">
                <div class="activity-field">
                    <label>Foto Pendukung <span style="font-weight:400; color:#94857e;">(Opsional)</span></label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <div class="activity-field">
                    <label>Kategori</label>
                    <select name="category">
                        <option value="Info Kamar">Info Kamar</option>
                        <option value="Update Kos">Update Kos</option>
                        <option value="Aktivitas" selected>Aktivitas</option>
                        <option value="Promo">Promo</option>
                        <option value="Social">Social</option>
                    </select>
                </div>

                <div class="activity-field">
                    <label>Tanggal Rilis</label>
                    <input type="date" name="date">
                </div>
            </div>

            <div class="activity-field">
                <label>Pengaturan Tambahan</label>
                <label class="activity-checkbox-field">
                    <input type="checkbox" name="is_pinned" value="1">
                    <p>Sematkan aktivitas baru ini di bagian paling atas feed beranda</p>
                </label>
            </div>

            <div class="activity-form-actions">
                <button type="submit" class="activity-add-btn">Tambah Aktivitas</button>
            </div>
        </form>
    </div>

    <div class="activity-panel">
        <div class="activity-toolbar">
            <input type="text" id="activitySearch" class="activity-search" placeholder="Cari info aktivitas...">
            <div class="activity-count">2 aktivitas ditampilkan</div>
        </div>

        <div class="activity-list" id="activityList">

            <div class="activity-item" data-name="promo khusus penghuni baru bulan ini">
                <div class="activity-icon">%</div>

                <div class="activity-info">
                    <h3>Promo khusus penghuni baru bulan ini</h3>
                    <p>Diskon 10% untuk pembayaran 3 bulan di muka. Berlaku sampai akhir bulan, DM admin untuk klaim ya!</p>

                    <div class="activity-meta">
                        <span class="activity-badge">2 jam lalu</span>
                        <span class="activity-badge badge-category">Kategori: Promo</span>
                        <span class="activity-badge badge-pinned">Disematkan</span>
                        <span class="activity-badge">Aktif</span>
                    </div>
                </div>

                <div class="activity-actions">
                    <a href="/admin/konten/activity/edit" class="activity-btn-small activity-edit">Edit</a>
                    <button type="button" class="activity-btn-small activity-delete" onclick="confirmDeleteActivity()">Hapus</button>
                </div>
            </div>

            <div class="activity-item" data-name="kamar a2 standard non ac sudah tersedia">
                <div class="activity-icon">A2</div>

                <div class="activity-info">
                    <h3>Kamar A2 (Standard Non-AC) sudah tersedia bulan ini!</h3>
                    <p>Cocok buat kamu yang cari kos nyaman dengan harga ramah kantong. Booking lebih awal yuk sebelum diambil orang</p>

                    <div class="activity-img-preview">
                        <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=300&auto=format&fit=crop" alt="Preview Kamar">
                    </div>

                    <div class="activity-meta">
                        <span class="activity-badge">8 jam lalu</span>
                        <span class="activity-badge badge-category">Kategori: Info Kamar</span>
                        <span class="activity-badge">Aktif</span>
                    </div>
                </div>

                <div class="activity-actions">
                    <a href="/admin/konten/activity/edit" class="activity-btn-small activity-edit">Edit</a>
                    <button type="button" class="activity-btn-small activity-delete" onclick="confirmDeleteActivity()">Hapus</button>
                </div>
            </div>

        </div>

        <div class="activity-empty" id="activityEmpty">
            <strong>Activity tidak ditemukan</strong>
            <span>Coba gunakan kata kunci pencarian yang lain.</span>
        </div>
    </div>

</div>

<script>
    const activitySearch = document.getElementById('activitySearch');
    const activityItems = document.querySelectorAll('.activity-item');
    const activityEmpty = document.getElementById('activityEmpty');

    activitySearch.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();
        let visibleCount = 0;

        activityItems.forEach(item => {
            const name = item.dataset.name;

            if (name.includes(keyword)) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        activityEmpty.classList.toggle('show', visibleCount === 0);
    });

    function confirmDeleteActivity() {
        const confirmDelete = confirm('Yakin mau hapus activity ini?');

        if (confirmDelete) {
            alert('Activity berhasil dihapus. Bagian database segera diproses oleh backend.');
        }
    }
</script>

@endsection