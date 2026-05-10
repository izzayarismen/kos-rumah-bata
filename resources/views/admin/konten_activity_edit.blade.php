@extends('admin.layout')

@section('page-title', 'Edit Activity')
@section('page-subtitle', 'Perbarui informasi activity yang tampil di landing page pelanggan.')

@section('content')

<style>
    .activity-edit-page {
        display: grid;
        gap: 22px;
    }

    .activity-edit-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .activity-edit-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        padding-bottom: 22px;
        margin-bottom: 24px;
        border-bottom: 1px solid #f0e3dd;
    }

    .activity-edit-head h2 {
        margin: 0;
        color: #211713;
        font-size: 27px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .activity-edit-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
        max-width: 640px;
    }

    .activity-status-chip {
        min-height: 38px;
        padding: 0 14px;
        border-radius: 999px;
        background: #fbf5f1;
        border: 1px solid #ead6ce;
        color: #7a5d52;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    .activity-edit-form {
        display: grid;
        gap: 20px;
    }

    .activity-edit-grid {
        display: grid;
        grid-template-columns: 1fr 180px;
        gap: 18px;
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
        transition: 0.2s ease;
    }

    .activity-field textarea {
        min-height: 150px;
        resize: vertical;
        line-height: 1.7;
    }

    .activity-field input:focus,
    .activity-field select:focus,
    .activity-field textarea:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .activity-preview {
        border: 1px solid #ead6ce;
        border-radius: 20px;
        padding: 18px;
        background: #fffdfb;
    }

    .activity-preview h3 {
        margin: 0 0 12px;
        color: #211713;
        font-size: 17px;
        font-weight: 700;
    }

    .activity-preview-box {
        border: 1px solid #eee1da;
        border-radius: 18px;
        padding: 16px;
        background: #ffffff;
    }

    .activity-preview-box strong {
        display: block;
        color: #211713;
        font-size: 15px;
        font-weight: 700;
        line-height: 1.5;
    }

    .activity-preview-box p {
        margin: 9px 0 0;
        color: #86766f;
        font-size: 14px;
        line-height: 1.7;
    }

    .activity-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 4px;
    }

    .activity-btn {
        min-height: 44px;
        min-width: 120px;
        border-radius: 14px;
        padding: 0 18px;
        border: none;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .activity-btn-primary {
        background: #c8664a;
        color: #ffffff;
    }

    .activity-btn-primary:hover {
        background: #b75a41;
    }

    .activity-btn-secondary {
        background: #f4ddd4;
        color: #c8664a;
    }

    .activity-btn-secondary:hover {
        background: #ebcec2;
    }

    @media (max-width: 760px) {
        .activity-edit-panel {
            padding: 22px;
        }

        .activity-edit-head {
            flex-direction: column;
        }

        .activity-edit-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 520px) {
        .activity-edit-head h2 {
            font-size: 24px;
        }

        .activity-actions {
            display: grid;
            grid-template-columns: 1fr;
        }

        .activity-btn {
            width: 100%;
        }
    }
</style>

<div class="activity-edit-page">
    <div class="activity-edit-panel">

        <div class="activity-edit-head">
            <div>
                <h2>Form Edit Activity</h2>
                <p>Ubah judul, deskripsi, tanggal, dan status activity yang akan tampil di landing page pelanggan.</p>
            </div>

            <span class="activity-status-chip">Activity Aktif</span>
        </div>

        <form action="/admin/konten/activity/update" method="POST" class="activity-edit-form">
            @csrf

            <div class="activity-field">
                <label>Judul Activity</label>
                <input type="text" name="title" value="Info Kamar Tersedia">
            </div>

            <div class="activity-field">
                <label>Deskripsi</label>
                <textarea name="description">Kamar 01 dan Kamar 02 tersedia untuk calon penghuni baru setelah proses verifikasi admin.</textarea>
            </div>

            <div class="activity-edit-grid">
                <div class="activity-field">
                    <label>Status Tampil</label>
                    <select name="status">
                        <option value="aktif" selected>Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="activity-field">
                    <label>Tanggal</label>
                    <input type="date" name="date" value="2026-05-09">
                </div>
            </div>

            <div class="activity-preview">
                <h3>Preview Activity</h3>

                <div class="activity-preview-box">
                    <strong>Info Kamar Tersedia</strong>
                    <p>Kamar 01 dan Kamar 02 tersedia untuk calon penghuni baru setelah proses verifikasi admin.</p>
                </div>
            </div>

            <div class="activity-actions">
                <a href="/admin/konten/activity" class="activity-btn activity-btn-secondary">Batal</a>
                <button type="submit" class="activity-btn activity-btn-primary">Update Activity</button>
            </div>
        </form>

    </div>
</div>

@endsection