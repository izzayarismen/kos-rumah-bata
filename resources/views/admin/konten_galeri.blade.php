@extends('admin.layout')

@section('page-title', 'Galeri')
@section('page-subtitle', 'Kelola foto galeri yang tampil di landing page pelanggan.')

@section('content')

<style>
    .gallery-page {
        display: grid;
        gap: 22px;
    }

    .gallery-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .gallery-head {
        margin-bottom: 24px;
    }

    .gallery-head h2 {
        margin: 0;
        color: #211713;
        font-size: 27px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .gallery-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
    }

    .gallery-form {
        border: 1px solid #ead6ce;
        border-radius: 22px;
        padding: 22px;
        background: #fffdfb;
        margin-bottom: 24px;
    }

    .gallery-form h3 {
        margin: 0 0 18px;
        color: #211713;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .gallery-form-row {
        display: grid;
        grid-template-columns: 1fr 180px 150px 170px;
        gap: 14px;
        align-items: end;
    }

    .gallery-field label {
        display: block;
        margin-bottom: 8px;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .gallery-field input,
    .gallery-field select {
        width: 100%;
        height: 48px;
        border: 1px solid #ead6ce;
        border-radius: 15px;
        padding: 0 14px;
        font-size: 14px;
        color: #211713;
        font-family: inherit;
        outline: none;
        background: #ffffff;
    }

    .gallery-field input[type="file"] {
        padding: 12px 14px;
        height: 48px;
    }

    .gallery-field input:focus,
    .gallery-field select:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .gallery-add-btn {
        height: 48px;
        border-radius: 15px;
        border: none;
        background: #c8664a;
        color: #ffffff;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .gallery-add-btn:hover {
        background: #b75a41;
    }

    .gallery-toolbar {
        display: grid;
        grid-template-columns: minmax(260px, 420px) auto;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .gallery-search {
        width: 100%;
        height: 48px;
        border: 1px solid #ead6ce;
        border-radius: 15px;
        padding: 0 16px;
        font-size: 14px;
        font-family: inherit;
        color: #211713;
        outline: none;
        background: #ffffff;
    }

    .gallery-search:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .gallery-count {
        color: #86766f;
        font-size: 13px;
        white-space: nowrap;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
    }

    .gallery-card {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 24px;
        overflow: hidden;
        transition: 0.2s ease;
    }

    .gallery-card:hover {
        border-color: #dfc6ba;
        box-shadow: 0 12px 28px rgba(80, 48, 31, 0.06);
        transform: translateY(-2px);
    }

    .gallery-image {
        height: 230px;
        background-size: cover;
        background-position: center;
        background-color: #fbf5f1;
    }

    .gallery-body {
        padding: 16px;
    }

    .gallery-meta {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .gallery-badge {
        min-height: 28px;
        padding: 0 10px;
        border-radius: 999px;
        background: #fbf5f1;
        border: 1px solid #eee1da;
        color: #7a5d52;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
    }

    .gallery-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 9px;
    }

    .gallery-btn-small {
        min-height: 42px;
        border: none;
        border-radius: 13px;
        padding: 0 16px;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s ease;
    }

    .gallery-edit {
        background: #c8664a;
        color: #ffffff;
    }

    .gallery-edit:hover {
        background: #b75a41;
    }

    .gallery-delete {
        background: #f4ddd4;
        color: #c8664a;
    }

    .gallery-delete:hover {
        background: #ebcec2;
    }

    .gallery-empty {
        display: none;
        text-align: center;
        padding: 38px 20px;
        border: 1px dashed #ead6ce;
        border-radius: 20px;
        background: #fffdfb;
        color: #86766f;
        margin-top: 14px;
    }

    .gallery-empty.show {
        display: block;
    }

    .gallery-empty strong {
        display: block;
        color: #211713;
        font-size: 18px;
        margin-bottom: 8px;
    }

    @media (max-width: 1150px) {
        .gallery-form-row {
            grid-template-columns: 1fr 180px;
        }

        .gallery-add-btn {
            grid-column: 1 / -1;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .gallery-panel {
            padding: 22px;
        }

        .gallery-form-row,
        .gallery-toolbar,
        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gallery-add-btn {
            grid-column: auto;
            width: 100%;
        }
    }
</style>

<div class="gallery-page">

    <div class="gallery-panel">
        <div class="gallery-head">
            <h2>Kelola Galeri</h2>
            <p>Upload dan atur foto yang akan tampil di landing page pelanggan.</p>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" class="gallery-form">
            @csrf

            <h3>Tambah Foto Galeri</h3>

            <div class="gallery-form-row">
                <div class="gallery-field">
                    <label>Upload Foto</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <div class="gallery-field">
                    <label>Status</label>
                    <select name="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="gallery-field">
                    <label>Urutan</label>
                    <input type="number" name="sort_order" placeholder="1">
                </div>

                <button type="submit" class="gallery-add-btn">Tambah Foto</button>
            </div>
        </form>
    </div>

    <div class="gallery-panel">
        <div class="gallery-toolbar">
            <input type="text" id="gallerySearch" class="gallery-search" placeholder="Cari foto berdasarkan status atau urutan...">
            <div class="gallery-count">4 foto ditampilkan</div>
        </div>

        <div class="gallery-grid" id="galleryList">

            <div class="gallery-card" data-name="foto 1 aktif">
                <div class="gallery-image" style="background-image: url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=900&q=80');"></div>

                <div class="gallery-body">
                    <div class="gallery-meta">
                        <span class="gallery-badge">Foto 1</span>
                        <span class="gallery-badge">Aktif</span>
                    </div>

                    <div class="gallery-actions">
                        <a href="/admin/konten/galeri/edit" class="gallery-btn-small gallery-edit">Edit</a>

                        <button type="button" class="gallery-btn-small gallery-delete" onclick="confirmDeleteGallery()">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>

            <div class="gallery-card" data-name="foto 2 aktif">
                <div class="gallery-image" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=80');"></div>

                <div class="gallery-body">
                    <div class="gallery-meta">
                        <span class="gallery-badge">Foto 2</span>
                        <span class="gallery-badge">Aktif</span>
                    </div>

                    <div class="gallery-actions">
                        <a href="/admin/konten/galeri/edit" class="gallery-btn-small gallery-edit">Edit</a>

                        <button type="button" class="gallery-btn-small gallery-delete" onclick="confirmDeleteGallery()">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>

            <div class="gallery-card" data-name="foto 3 aktif">
                <div class="gallery-image" style="background-image: url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=900&q=80');"></div>

                <div class="gallery-body">
                    <div class="gallery-meta">
                        <span class="gallery-badge">Foto 3</span>
                        <span class="gallery-badge">Aktif</span>
                    </div>

                    <div class="gallery-actions">
                        <a href="/admin/konten/galeri/edit" class="gallery-btn-small gallery-edit">Edit</a>

                        <button type="button" class="gallery-btn-small gallery-delete" onclick="confirmDeleteGallery()">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>

            <div class="gallery-card" data-name="foto 4 nonaktif">
                <div class="gallery-image" style="background-image: url('https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=900&q=80');"></div>

                <div class="gallery-body">
                    <div class="gallery-meta">
                        <span class="gallery-badge">Foto 4</span>
                        <span class="gallery-badge">Nonaktif</span>
                    </div>

                    <div class="gallery-actions">
                        <a href="/admin/konten/galeri/edit" class="gallery-btn-small gallery-edit">Edit</a>

                        <button type="button" class="gallery-btn-small gallery-delete" onclick="confirmDeleteGallery()">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div class="gallery-empty" id="galleryEmpty">
            <strong>Foto tidak ditemukan</strong>
            <span>Coba gunakan kata kunci pencarian yang lain.</span>
        </div>
    </div>

</div>

<script>
    const gallerySearch = document.getElementById('gallerySearch');
    const galleryItems = document.querySelectorAll('.gallery-card');
    const galleryEmpty = document.getElementById('galleryEmpty');

    gallerySearch.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();
        let visibleCount = 0;

        galleryItems.forEach(item => {
            const name = item.dataset.name;

            if (name.includes(keyword)) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        galleryEmpty.classList.toggle('show', visibleCount === 0);
    });

    function confirmDeleteGallery() {
        const confirmDelete = confirm('Yakin mau hapus foto galeri ini?');

        if (confirmDelete) {
            alert('Foto galeri berhasil dihapus. Nanti bagian ini disambungkan ke backend.');
        }
    }
</script>

@endsection