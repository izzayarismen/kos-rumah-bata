@extends('admin.layout')

@section('page-title', 'Activity')
@section('page-subtitle', 'Kelola aktivitas atau informasi terbaru yang tampil di landing page pelanggan.')

@section('content')

<style>
    .activity-page {
        display: grid;
        gap: 22px;
    }

    .activity-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .activity-head {
        display: grid;
        grid-template-columns: 1fr auto;
        align-items: start;
        gap: 18px;
        margin-bottom: 24px;
    }

    .activity-head h2 {
        margin: 0;
        color: #211713;
        font-size: 27px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .activity-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
        max-width: 650px;
    }

    .activity-form {
        display: grid;
        gap: 16px;
        padding: 20px;
        border: 1px solid #ead6ce;
        border-radius: 22px;
        background: #fffdfb;
        margin-bottom: 24px;
    }

    .activity-form h3 {
        margin: 0;
        color: #211713;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .activity-field label {
        display: block;
        margin-bottom: 8px;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .activity-field input,
    .activity-field select,
    .activity-field textarea {
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

    .activity-field textarea {
        min-height: 105px;
        resize: vertical;
        line-height: 1.6;
    }

    .activity-field input:focus,
    .activity-field select:focus,
    .activity-field textarea:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .activity-form-grid {
        display: grid;
        grid-template-columns: 1fr 180px;
        gap: 16px;
    }

    .activity-form-actions {
        display: flex;
        justify-content: flex-end;
    }

    .activity-add-btn {
        min-height: 44px;
        border-radius: 14px;
        padding: 0 18px;
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
        transition: 0.2s ease;
    }

    .activity-add-btn:hover {
        background: #b75a41;
    }

    .activity-toolbar {
        display: grid;
        grid-template-columns: minmax(260px, 420px) auto;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .activity-search {
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

    .activity-search:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .activity-count {
        color: #86766f;
        font-size: 13px;
        white-space: nowrap;
    }

    .activity-list {
        display: grid;
        gap: 14px;
    }

    .activity-item {
        border: 1px solid #ead6ce;
        border-radius: 22px;
        padding: 18px;
        background: #ffffff;
        display: grid;
        grid-template-columns: 54px 1fr auto;
        gap: 16px;
        align-items: center;
        transition: 0.2s ease;
    }

    .activity-item:hover {
        border-color: #dfc6ba;
        box-shadow: 0 12px 28px rgba(80, 48, 31, 0.06);
        transform: translateY(-2px);
    }

    .activity-icon {
        width: 52px;
        height: 52px;
        border-radius: 18px;
        background: #fbf5f1;
        color: #c8664a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .activity-info h3 {
        margin: 0;
        color: #211713;
        font-size: 17px;
        font-weight: 700;
        letter-spacing: -0.01em;
    }

    .activity-info p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 14px;
        line-height: 1.7;
    }

    .activity-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .activity-badge {
        display: inline-flex;
        align-items: center;
        min-height: 28px;
        padding: 0 10px;
        border-radius: 999px;
        background: #fbf5f1;
        border: 1px solid #eee1da;
        color: #7a5d52;
        font-size: 12px;
        font-weight: 600;
    }

    .activity-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 9px;
        flex-wrap: wrap;
    }

    .activity-btn-small {
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
        background: #f4ddd4;
        color: #c8664a;
    }

    .activity-delete:hover {
        background: #ebcec2;
    }

    .activity-empty {
        display: none;
        text-align: center;
        padding: 38px 20px;
        border: 1px dashed #ead6ce;
        border-radius: 20px;
        background: #fffdfb;
        color: #86766f;
        margin-top: 14px;
    }

    .activity-empty.show {
        display: block;
    }

    .activity-empty strong {
        display: block;
        color: #211713;
        font-size: 18px;
        margin-bottom: 8px;
    }

    @media (max-width: 900px) {
        .activity-head,
        .activity-form-grid,
        .activity-toolbar,
        .activity-item {
            grid-template-columns: 1fr;
        }

        .activity-count {
            white-space: normal;
        }

        .activity-actions {
            justify-content: flex-start;
        }
    }

    @media (max-width: 520px) {
        .activity-panel {
            padding: 22px;
        }

        .activity-head h2 {
            font-size: 24px;
        }

        .activity-form {
            padding: 18px;
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
                <h2>Kelola Activity</h2>
                <p>Atur informasi aktivitas, pengumuman, atau update terbaru yang akan tampil di landing page pelanggan.</p>
            </div>
        </div>

        <form action="#" method="POST" class="activity-form">
            @csrf

            <h3>Tambah Activity Baru</h3>

            <div class="activity-field">
                <label>Judul Activity</label>
                <input type="text" name="title" placeholder="Contoh: Info Kamar Tersedia">
            </div>

            <div class="activity-field">
                <label>Deskripsi</label>
                <textarea name="description" placeholder="Tulis deskripsi activity yang akan tampil di landing page."></textarea>
            </div>

            <div class="activity-form-grid">
                <div class="activity-field">
                    <label>Status Tampil</label>
                    <select name="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="activity-field">
                    <label>Tanggal</label>
                    <input type="date" name="date">
                </div>
            </div>

            <div class="activity-form-actions">
                <button type="submit" class="activity-add-btn">Tambah Activity</button>
            </div>
        </form>
    </div>

    <div class="activity-panel">
        <div class="activity-toolbar">
            <input type="text" id="activitySearch" class="activity-search" placeholder="Cari activity...">
            <div class="activity-count">4 activity ditampilkan</div>
        </div>

        <div class="activity-list" id="activityList">

            <div class="activity-item" data-name="info kamar tersedia">
                <div class="activity-icon">I</div>

                <div class="activity-info">
                    <h3>Info Kamar Tersedia</h3>
                    <p>Kamar 01 dan Kamar 02 tersedia untuk calon penghuni baru setelah proses verifikasi admin.</p>

                    <div class="activity-meta">
                        <span class="activity-badge">9 Mei 2026</span>
                        <span class="activity-badge">Aktif</span>
                    </div>
                </div>

                <div class="activity-actions">
                    <a href="/admin/konten/activity/edit" class="activity-btn-small activity-edit">Edit</a>

                    <button type="button" class="activity-btn-small activity-delete" onclick="confirmDeleteActivity()">
                        Hapus
                    </button>
                </div>
            </div>

            <div class="activity-item" data-name="update peraturan kos">
                <div class="activity-icon">U</div>

                <div class="activity-info">
                    <h3>Update Peraturan Kos</h3>
                    <p>Penghuni diharapkan menjaga kebersihan area bersama dan tidak membuat kebisingan pada malam hari.</p>

                    <div class="activity-meta">
                        <span class="activity-badge">8 Mei 2026</span>
                        <span class="activity-badge">Aktif</span>
                    </div>
                </div>

                <div class="activity-actions">
                    <a href="/admin/konten/activity/edit" class="activity-btn-small activity-edit">Edit</a>

                    <button type="button" class="activity-btn-small activity-delete" onclick="confirmDeleteActivity()">
                        Hapus
                    </button>
                </div>
            </div>

            <div class="activity-item" data-name="promo pembayaran dp">
                <div class="activity-icon">P</div>

                <div class="activity-info">
                    <h3>Promo Pembayaran DP</h3>
                    <p>Calon penghuni dapat melakukan pembayaran DP terlebih dahulu sesuai ketentuan yang berlaku.</p>

                    <div class="activity-meta">
                        <span class="activity-badge">7 Mei 2026</span>
                        <span class="activity-badge">Aktif</span>
                    </div>
                </div>

                <div class="activity-actions">
                    <a href="/admin/konten/activity/edit" class="activity-btn-small activity-edit">Edit</a>

                    <button type="button" class="activity-btn-small activity-delete" onclick="confirmDeleteActivity()">
                        Hapus
                    </button>
                </div>
            </div>

            <div class="activity-item" data-name="maintenance area kos">
                <div class="activity-icon">M</div>

                <div class="activity-info">
                    <h3>Maintenance Area Kos</h3>
                    <p>Perbaikan area bersama dilakukan secara berkala untuk menjaga kenyamanan penghuni.</p>

                    <div class="activity-meta">
                        <span class="activity-badge">6 Mei 2026</span>
                        <span class="activity-badge">Aktif</span>
                    </div>
                </div>

                <div class="activity-actions">
                    <a href="/admin/konten/activity/edit" class="activity-btn-small activity-edit">Edit</a>

                    <button type="button" class="activity-btn-small activity-delete" onclick="confirmDeleteActivity()">
                        Hapus
                    </button>
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
            alert('Activity berhasil dihapus. Nanti bagian ini disambungkan ke backend.');
        }
    }
</script>

@endsection