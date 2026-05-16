@extends('admin.layout')

@section('page-title', 'Verifikasi Pembayaran')
@section('page-subtitle', 'Cek bukti pembayaran sebelum status sewa diperbarui.')

@section('content')

<style>
    .payment-detail-page {
        display: grid;
        gap: 22px;
    }

    .payment-detail-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .payment-detail-head {
        display: grid;
        grid-template-columns: 1fr auto;
        align-items: start;
        gap: 18px;
        margin-bottom: 24px;
    }

    .payment-detail-head h2 {
        margin: 0;
        color: #211713;
        font-size: 27px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .payment-detail-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
        max-width: 620px;
    }

    .payment-detail-back {
        height: 44px;
        border: 1px solid #ead6ce;
        background: #fbf5f1;
        color: #c8664a;
        border-radius: 14px;
        padding: 0 18px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s ease;
        white-space: nowrap;
    }

    .payment-detail-back:hover {
        background: #f4ddd4;
    }

    .payment-detail-grid {
        display: grid;
        grid-template-columns: 1.35fr 0.85fr;
        gap: 22px;
        align-items: start;
    }

    .payment-detail-card {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 24px;
        padding: 24px;
    }

    .payment-profile {
        display: flex;
        align-items: center;
        gap: 16px;
        padding-bottom: 22px;
        margin-bottom: 22px;
        border-bottom: 1px solid #f0e3dd;
    }

    .payment-profile-avatar {
        width: 70px;
        height: 70px;
        border-radius: 22px;
        background: #fbf5f1;
        color: #c8664a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .payment-profile h3 {
        margin: 0;
        color: #211713;
        font-size: 23px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .payment-profile p {
        margin: 7px 0 0;
        color: #86766f;
        font-size: 14px;
        line-height: 1.5;
    }

    .payment-status {
        display: inline-flex;
        margin-top: 10px;
        padding: 6px 10px;
        border-radius: 999px;
        background: #fbf5f1;
        color: #7a5d52;
        border: 1px solid #eee1da;
        font-size: 12px;
        font-weight: 600;
    }

    .payment-info-list {
        display: grid;
        gap: 0;
        border: 1px solid #ead6ce;
        border-radius: 20px;
        overflow: hidden;
        background: #fffdfb;
        margin-bottom: 22px;
    }

    .payment-info-row {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 16px;
        padding: 16px 18px;
        border-bottom: 1px solid #f0e3dd;
        align-items: center;
    }

    .payment-info-row:last-child {
        border-bottom: none;
    }

    .payment-info-row span {
        color: #8f8179;
        font-size: 14px;
        line-height: 1.5;
    }

    .payment-info-row strong {
        color: #211713;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.5;
    }

    .payment-proof {
        border: 1px solid #ead6ce;
        border-radius: 22px;
        padding: 18px;
        background: #ffffff;
    }

    .payment-proof h4 {
        margin: 0 0 14px;
        color: #211713;
        font-size: 18px;
        font-weight: 700;
        letter-spacing: -0.01em;
    }

    .proof-preview {
        min-height: 260px;
        border-radius: 18px;
        border: 1px dashed #dca999;
        background: #fbf5f1;
        color: #c8664a;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        padding: 18px;
        margin-bottom: 14px;
    }

    .proof-meta {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 14px;
    }

    .proof-meta-box {
        border: 1px solid #eee1da;
        border-radius: 16px;
        padding: 14px;
        background: #fffdfb;
    }

    .proof-meta-box span {
        display: block;
        color: #8f8179;
        font-size: 12px;
        margin-bottom: 6px;
    }

    .proof-meta-box strong {
        display: block;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .proof-action {
        min-height: 42px;
        border-radius: 14px;
        background: #c8664a;
        color: #ffffff;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        font-size: 14px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .proof-action:hover {
        background: #b75a41;
    }

    .decision-title {
        margin: 0 0 10px;
        color: #211713;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .decision-desc {
        margin: 0 0 18px;
        color: #86766f;
        font-size: 14px;
        line-height: 1.7;
    }

    .decision-checklist {
        display: grid;
        gap: 12px;
    }

    .decision-check {
        border: 1px solid #ead6ce;
        background: #fffdfb;
        border-radius: 18px;
        padding: 15px;
        display: grid;
        grid-template-columns: 20px 1fr;
        gap: 12px;
        align-items: start;
        cursor: pointer;
    }

    .decision-check input {
        width: 17px;
        height: 17px;
        margin-top: 2px;
        accent-color: #c8664a;
    }

    .decision-check strong {
        display: block;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
    }

    .decision-check span {
        display: block;
        color: #86766f;
        font-size: 12px;
        line-height: 1.5;
        margin-top: 4px;
    }

    .payment-note {
        margin-top: 18px;
    }

    .payment-note label {
        display: block;
        margin-bottom: 8px;
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .payment-note textarea {
        width: 100%;
        min-height: 115px;
        border: 1px solid #ead6ce;
        border-radius: 16px;
        padding: 14px 16px;
        font-family: inherit;
        font-size: 14px;
        color: #211713;
        outline: none;
        resize: vertical;
        background: #ffffff;
    }

    .payment-note textarea:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .decision-actions {
        display: grid;
        gap: 10px;
        margin-top: 20px;
    }

    .decision-btn {
        min-height: 46px;
        border: none;
        border-radius: 15px;
        padding: 0 18px;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .decision-approve {
        background: #c8664a;
        color: #ffffff;
    }

    .decision-approve:hover {
        background: #b75a41;
    }

    .decision-reupload {
        background: #f4ddd4;
        color: #c8664a;
    }

    .decision-reupload:hover {
        background: #ebcec2;
    }

    .decision-note {
        margin: 14px 0 0;
        color: #86766f;
        font-size: 12px;
        line-height: 1.6;
    }

    @media (max-width: 1100px) {
        .payment-detail-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 760px) {
        .payment-detail-panel,
        .payment-detail-card {
            padding: 22px;
        }

        .payment-detail-head {
            grid-template-columns: 1fr;
        }

        .payment-detail-back {
            width: 100%;
        }

        .payment-info-row {
            grid-template-columns: 1fr;
            gap: 6px;
        }

        .proof-meta {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 520px) {
        .payment-detail-head h2 {
            font-size: 24px;
        }

        .payment-profile {
            flex-direction: column;
            align-items: flex-start;
        }

        .payment-profile-avatar {
            width: 62px;
            height: 62px;
            border-radius: 20px;
        }

        .proof-preview {
            min-height: 210px;
        }
    }
</style>

<div class="payment-detail-page">

    <div class="payment-detail-panel">

        <div class="payment-detail-head">
            <div>
                <h2>Cek Bukti Pembayaran</h2>
                <p>Pastikan nominal, tujuan rekening, dan bukti transfer sudah sesuai sebelum pembayaran diverifikasi.</p>
            </div>

            <a href="/admin/pembayaran" class="payment-detail-back">Kembali</a>
        </div>

        <div class="payment-detail-grid">

            <div class="payment-detail-card">

                <div class="payment-profile">
                    <div class="payment-profile-avatar">RA</div>

                    <div>
                        <h3>Rani Amelia</h3>
                        <p>Kamar 08 · Tower Genap</p>
                        <span class="payment-status">Menunggu Verifikasi</span>
                    </div>
                </div>

                <div class="payment-info-list">
                    <div class="payment-info-row">
                        <span>Jenis Pembayaran</span>
                        <strong>DP 50%</strong>
                    </div>

                    <div class="payment-info-row">
                        <span>Jumlah Dibayar</span>
                        <strong>Rp 4.200.000</strong>
                    </div>

                    <div class="payment-info-row">
                        <span>Total Tagihan</span>
                        <strong>Rp 8.400.000 / tahun</strong>
                    </div>

                    <div class="payment-info-row">
                        <span>Sisa Pembayaran</span>
                        <strong>Rp 4.200.000</strong>
                    </div>

                    <div class="payment-info-row">
                        <span>Tanggal Upload</span>
                        <strong>9 Mei 2026</strong>
                    </div>

                    <div class="payment-info-row">
                        <span>Metode Pembayaran</span>
                        <strong>Transfer Bank</strong>
                    </div>
                </div>

                <div class="payment-proof">
                    <h4>Bukti Transfer</h4>

                    <div class="proof-preview">
                        Preview bukti transfer akan tampil di sini
                    </div>

                    <div class="proof-meta">
                        <div class="proof-meta-box">
                            <span>Nama File</span>
                            <strong>bukti_dp_rani.jpg</strong>
                        </div>

                        <div class="proof-meta-box">
                            <span>Status File</span>
                            <strong>Sudah diupload</strong>
                        </div>
                    </div>

                    <a href="#" class="proof-action">Lihat Bukti Transfer</a>
                </div>

            </div>

            <div class="payment-detail-card">

                <h3 class="decision-title">Keputusan Admin</h3>
                <p class="decision-desc">
                    Cek data pembayaran dengan teliti. Jika bukti sudah benar, admin bisa memverifikasi pembayaran. Jika belum jelas, minta penghuni upload ulang.
                </p>

                <div class="decision-checklist">

                    <label class="decision-check">
                        <input type="checkbox">
                        <div>
                            <strong>Nominal pembayaran sesuai.</strong>
                            <span>Jumlah transfer sama dengan data pembayaran yang dikirim penghuni.</span>
                        </div>
                    </label>

                    <label class="decision-check">
                        <input type="checkbox">
                        <div>
                            <strong>Bukti transfer terlihat jelas.</strong>
                            <span>Nama pengirim, nominal, dan tanggal transfer dapat dibaca.</span>
                        </div>
                    </label>

                    <label class="decision-check">
                        <input type="checkbox">
                        <div>
                            <strong>Tujuan rekening sesuai.</strong>
                            <span>Pembayaran masuk ke rekening Kos Rumah Bata.</span>
                        </div>
                    </label>

                    <label class="decision-check">
                        <input type="checkbox">
                        <div>
                            <strong>Data penghuni cocok.</strong>
                            <span>Nama dan kamar sesuai dengan data penghuni di sistem.</span>
                        </div>
                    </label>

                </div>

                <div class="payment-note">
                    <label>Catatan Admin</label>
                    <textarea placeholder="Tulis catatan jika bukti kurang jelas atau perlu upload ulang."></textarea>
                </div>

                <div class="decision-actions">
                    <button type="button" class="decision-btn decision-approve" onclick="alert('Pembayaran diverifikasi. Nantinya backend akan mengubah status pembayaran menjadi terverifikasi.')">
                        Verifikasi Pembayaran
                    </button>

                    <button type="button" class="decision-btn decision-reupload" onclick="alert('Permintaan upload ulang dikirim. Nantinya backend akan mengubah status menjadi perlu upload ulang.')">
                        Minta Upload Ulang
                    </button>
                </div>

                <p class="decision-note">
                    Setelah pembayaran diverifikasi, status pembayaran penghuni akan diperbarui di sistem.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection