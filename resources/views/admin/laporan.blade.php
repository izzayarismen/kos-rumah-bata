@extends('admin.layout')

@section('page-title', 'Laporan')
@section('page-subtitle', 'Ringkasan pendapatan dan pengeluaran Kos Rumah Bata.')

@section('content')

<style>
    .report-page {
        display: grid;
        gap: 22px;
    }

    .report-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .report-hero {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 24px;
        align-items: end;
    }

    .report-hero h2 {
        margin: 0;
        color: #211713;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .report-hero p {
        margin: 10px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.7;
        max-width: 620px;
    }

    .report-filter {
        display: grid;
        gap: 10px;
    }

    .report-filter label {
        color: #211713;
        font-size: 14px;
        font-weight: 600;
    }

    .report-filter select {
        width: 100%;
        height: 50px;
        border: 1px solid #ead6ce;
        border-radius: 15px;
        padding: 0 16px;
        font-size: 14px;
        color: #211713;
        font-family: inherit;
        outline: none;
        background: #ffffff;
    }

    .report-filter select:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .report-filter button {
        height: 46px;
        border: none;
        border-radius: 14px;
        background: #c8664a;
        color: #ffffff;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .report-filter button:hover {
        background: #b75a41;
    }

    .report-total-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .report-total-card {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 24px;
        padding: 26px;
        transition: 0.2s ease;
    }

    .report-total-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(80, 48, 31, 0.06);
        border-color: #dfc6ba;
    }

    .report-total-card span {
        display: block;
        color: #8f8179;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 12px;
    }

    .report-total-card h3 {
        margin: 0;
        color: #211713;
        font-size: 34px;
        font-weight: 700;
        letter-spacing: -0.04em;
    }

    .report-total-card p {
        margin: 12px 0 0;
        color: #86766f;
        font-size: 14px;
        line-height: 1.6;
    }

    .report-content-grid {
        display: grid;
        grid-template-columns: 1.25fr 0.75fr;
        gap: 22px;
    }

    .report-section-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 18px;
    }

    .report-section-head h3 {
        margin: 0;
        color: #211713;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .report-section-head p {
        margin: 7px 0 0;
        color: #86766f;
        font-size: 14px;
        line-height: 1.6;
    }

    .report-period {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 36px;
        padding: 0 13px;
        border-radius: 999px;
        background: #fbf5f1;
        border: 1px solid #ead6ce;
        color: #7a5d52;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }

    .transaction-list {
        display: grid;
        gap: 12px;
    }

    .transaction-item {
        border: 1px solid #ead6ce;
        border-radius: 18px;
        padding: 16px;
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 16px;
        align-items: center;
        background: #ffffff;
    }

    .transaction-item strong {
        display: block;
        color: #211713;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .transaction-item span {
        display: block;
        color: #86766f;
        font-size: 13px;
        line-height: 1.5;
    }

    .transaction-item b {
        color: #211713;
        font-size: 15px;
        font-weight: 700;
        white-space: nowrap;
    }

    .monthly-summary {
        display: grid;
        gap: 14px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #f0e3dd;
    }

    .summary-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .summary-row span {
        color: #86766f;
        font-size: 14px;
    }

    .summary-row strong {
        color: #211713;
        font-size: 14px;
        font-weight: 700;
        text-align: right;
    }

    .report-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 22px;
    }

    .report-action-btn {
        min-height: 44px;
        border-radius: 14px;
        padding: 0 18px;
        text-decoration: none;
        border: none;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .report-action-primary {
        background: #c8664a;
        color: #ffffff;
    }

    .report-action-primary:hover {
        background: #b75a41;
    }

    .report-action-secondary {
        background: #f4ddd4;
        color: #c8664a;
    }

    .report-action-secondary:hover {
        background: #ebcec2;
    }

    .report-note {
        margin-top: 16px;
        border: 1px solid #ead6ce;
        background: #fffdfb;
        border-radius: 18px;
        padding: 16px;
        color: #86766f;
        font-size: 13px;
        line-height: 1.7;
    }

    @media (max-width: 1100px) {
        .report-hero {
            grid-template-columns: 1fr;
        }

        .report-content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 760px) {
        .report-panel {
            padding: 22px;
        }

        .report-total-grid {
            grid-template-columns: 1fr;
        }

        .report-hero h2 {
            font-size: 24px;
        }

        .report-total-card h3 {
            font-size: 28px;
        }

        .transaction-item {
            grid-template-columns: 1fr;
        }

        .transaction-item b {
            white-space: normal;
        }
    }

    @media (max-width: 520px) {
        .report-section-head {
            display: grid;
        }

        .report-actions {
            display: grid;
            grid-template-columns: 1fr;
        }

        .report-action-btn {
            width: 100%;
        }
    }
</style>

<div class="report-page">

    <div class="report-panel">
        <div class="report-hero">
            <div>
                <h2>Laporan Keuangan Bulanan</h2>
                <p>
                    Laporan ini menampilkan total pendapatan dan pengeluaran kos dalam satu periode bulan.
                    Data ini nanti dapat disambungkan ke backend agar berubah otomatis sesuai bulan yang dipilih.
                </p>
            </div>

            <form action="/admin/laporan" method="GET" class="report-filter">
                <label>Pilih Bulan Laporan</label>
                <select name="bulan">
                    <option value="januari-2026">Januari 2026</option>
                    <option value="februari-2026">Februari 2026</option>
                    <option value="maret-2026">Maret 2026</option>
                    <option value="april-2026">April 2026</option>
                    <option value="mei-2026">Mei 2026</option>
                    <option value="juni-2026" selected>Juni 2026</option>
                    <option value="juli-2026">Juli 2026</option>
                    <option value="agustus-2026">Agustus 2026</option>
                    <option value="september-2026">September 2026</option>
                    <option value="oktober-2026">Oktober 2026</option>
                    <option value="november-2026">November 2026</option>
                    <option value="desember-2026">Desember 2026</option>
                </select>

                <button type="submit">Terapkan</button>
            </form>
        </div>
    </div>

    <div class="report-total-grid">
        <div class="report-total-card">
            <span>Total Pendapatan</span>
            <h3>Rp 36.000.000</h3>
            <p>Pendapatan berasal dari pembayaran lunas dan DP penghuni selama bulan Juni 2026.</p>
        </div>

        <div class="report-total-card">
            <span>Total Pengeluaran</span>
            <h3>Rp 2.500.000</h3>
            <p>Pengeluaran berasal dari biaya maintenance kamar dan kebutuhan operasional kos.</p>
        </div>
    </div>

    <div class="report-content-grid">

        <div class="report-panel">
            <div class="report-section-head">
                <div>
                    <h3>Rincian Transaksi</h3>
                    <p>Daftar pemasukan dan pengeluaran yang tercatat pada periode terpilih.</p>
                </div>

                <span class="report-period">Juni 2026</span>
            </div>

            <div class="transaction-list">
                <div class="transaction-item">
                    <div>
                        <strong>Pembayaran Lunas</strong>
                        <span>12 penghuni melakukan pembayaran penuh.</span>
                    </div>
                    <b>Rp 24.000.000</b>
                </div>

                <div class="transaction-item">
                    <div>
                        <strong>Pembayaran DP</strong>
                        <span>6 penghuni melakukan pembayaran tahap pertama.</span>
                    </div>
                    <b>Rp 12.000.000</b>
                </div>

                <div class="transaction-item">
                    <div>
                        <strong>Maintenance Kamar</strong>
                        <span>Biaya perbaikan AC, lampu, saluran air, dan cat ulang kamar.</span>
                    </div>
                    <b>Rp 2.500.000</b>
                </div>
            </div>

            <div class="report-actions">
                <a href="#" class="report-action-btn report-action-primary">Export PDF</a>
                <a href="#" class="report-action-btn report-action-secondary">Export Excel</a>
            </div>
        </div>

        <div class="report-panel">
            <div class="report-section-head">
                <div>
                    <h3>Ringkasan</h3>
                    <p>Rekap singkat kondisi keuangan bulan ini.</p>
                </div>
            </div>

            <div class="monthly-summary">
                <div class="summary-row">
                    <span>Pendapatan</span>
                    <strong>Rp 36.000.000</strong>
                </div>

                <div class="summary-row">
                    <span>Pengeluaran</span>
                    <strong>Rp 2.500.000</strong>
                </div>

                <div class="summary-row">
                    <span>Selisih Bersih</span>
                    <strong>Rp 33.500.000</strong>
                </div>

                <div class="summary-row">
                    <span>Transaksi Masuk</span>
                    <strong>18 transaksi</strong>
                </div>

                <div class="summary-row">
                    <span>Maintenance Dibayar</span>
                    <strong>5 pekerjaan</strong>
                </div>
            </div>

            <div class="report-note">
                Catatan: Untuk frontend sementara, data masih statis. Saat backend sudah dibuat,
                nilai pendapatan, pengeluaran, dan rincian transaksi bisa berubah otomatis berdasarkan bulan yang dipilih.
            </div>
        </div>

    </div>

</div>

@endsection