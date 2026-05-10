@extends('admin.layout')

@section('page-title', 'Data Pembayaran')
@section('page-subtitle', 'Bukti pembayaran dari penghuni yang perlu dicek admin.')

@section('content')

<style>
    .payment-page {
        display: grid;
        gap: 22px;
    }

    .payment-summary {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
    }

    .summary-card {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 22px;
        padding: 20px;
        min-height: 112px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: 0.2s ease;
    }

    .summary-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(80, 48, 31, 0.06);
        border-color: #dfc6ba;
    }

    .summary-card span {
        display: block;
        color: #8f8179;
        font-size: 13px;
        font-weight: 500;
        line-height: 1.4;
    }

    .summary-card strong {
        display: block;
        color: #211713;
        font-size: 30px;
        font-weight: 700;
        letter-spacing: -0.03em;
        margin-top: 14px;
    }

    .summary-card small {
        display: block;
        color: #9a8d85;
        font-size: 12px;
        line-height: 1.5;
        margin-top: 6px;
    }

    .payment-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .payment-head {
        display: grid;
        grid-template-columns: 1fr minmax(260px, 380px);
        gap: 18px;
        align-items: start;
        margin-bottom: 22px;
    }

    .payment-head h2 {
        margin: 0;
        color: #211713;
        font-size: 27px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .payment-head p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
        max-width: 650px;
    }

    .payment-search {
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

    .payment-search:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .payment-filter {
        display: flex;
        align-items: center;
        gap: 9px;
        flex-wrap: wrap;
        margin-bottom: 18px;
    }

    .payment-filter-btn {
        border: 1px solid #ead6ce;
        background: #fbf5f1;
        color: #7a5d52;
        padding: 11px 15px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .payment-filter-btn:hover {
        background: #f4ddd4;
        color: #c8664a;
    }

    .payment-filter-btn.active {
        background: #211713;
        border-color: #211713;
        color: #ffffff;
    }

    .payment-list {
        display: grid;
        gap: 14px;
    }

    .payment-item {
        border: 1px solid #ead6ce;
        border-radius: 20px;
        background: #ffffff;
        padding: 18px;
        display: grid;
        grid-template-columns: 54px 1fr auto;
        gap: 16px;
        align-items: center;
        transition: 0.2s ease;
    }

    .payment-item:hover {
        border-color: #dfc6ba;
        box-shadow: 0 12px 28px rgba(80, 48, 31, 0.06);
        transform: translateY(-2px);
    }

    .payment-avatar {
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

    .payment-main h3 {
        margin: 0;
        color: #211713;
        font-size: 18px;
        font-weight: 700;
        letter-spacing: -0.01em;
    }

    .payment-main p {
        margin: 6px 0 0;
        color: #86766f;
        font-size: 14px;
        line-height: 1.5;
    }

    .payment-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .payment-badge {
        display: inline-flex;
        padding: 6px 10px;
        border-radius: 999px;
        background: #fbf5f1;
        color: #7a5d52;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid #eee1da;
    }

    .payment-date {
        color: #9a8d85;
        font-size: 12px;
    }

    .payment-action {
        min-height: 44px;
        border: none;
        border-radius: 14px;
        padding: 0 18px;
        background: #c8664a;
        color: #ffffff;
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

    .payment-action:hover {
        background: #b75a41;
    }

    .empty-payment {
        display: none;
        text-align: center;
        padding: 42px 20px;
        border: 1px dashed #ead6ce;
        border-radius: 20px;
        background: #fffdfb;
        color: #86766f;
        margin-top: 16px;
    }

    .empty-payment.show {
        display: block;
    }

    .empty-payment strong {
        display: block;
        color: #211713;
        font-size: 18px;
        margin-bottom: 8px;
    }

    @media (max-width: 1100px) {
        .payment-summary {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .payment-head {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 900px) {
        .payment-item {
            grid-template-columns: 54px 1fr;
        }

        .payment-action {
            grid-column: 2;
            justify-self: start;
        }
    }

    @media (max-width: 620px) {
        .payment-panel {
            padding: 22px;
        }

        .payment-summary {
            grid-template-columns: 1fr;
        }

        .payment-head h2 {
            font-size: 24px;
        }

        .payment-filter {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .payment-filter-btn {
            width: 100%;
        }

        .payment-item {
            grid-template-columns: 1fr;
        }

        .payment-avatar {
            width: 50px;
            height: 50px;
        }

        .payment-action {
            grid-column: auto;
            width: 100%;
        }
    }
</style>

<div class="payment-page">

    <div class="payment-summary">
        <div class="summary-card">
            <span>Bukti Masuk</span>
            <strong>3</strong>
            <small>Total bukti pembayaran yang masuk.</small>
        </div>

        <div class="summary-card">
            <span>Menunggu Verifikasi</span>
            <strong>1</strong>
            <small>Perlu dicek oleh admin.</small>
        </div>

        <div class="summary-card">
            <span>Terverifikasi</span>
            <strong>1</strong>
            <small>Bukti pembayaran sudah valid.</small>
        </div>

        <div class="summary-card">
            <span>Upload Ulang</span>
            <strong>1</strong>
            <small>Bukti belum jelas atau tidak sesuai.</small>
        </div>
    </div>

    <div class="payment-panel">

        <div class="payment-head">
            <div>
                <h2>Verifikasi Pembayaran</h2>
                <p>Cek bukti transfer yang dikirim penghuni dari halaman pembayaran. Detail nominal dan bukti pembayaran dibuka melalui tombol cek data.</p>
            </div>

            <input type="text" id="paymentSearch" class="payment-search" placeholder="Cari nama atau kamar...">
        </div>

        <div class="payment-filter">
            <button type="button" class="payment-filter-btn active" data-filter="all">Semua</button>
            <button type="button" class="payment-filter-btn" data-filter="waiting">Menunggu Verifikasi</button>
            <button type="button" class="payment-filter-btn" data-filter="verified">Terverifikasi</button>
            <button type="button" class="payment-filter-btn" data-filter="reupload">Upload Ulang</button>
        </div>

        <div class="payment-list" id="paymentList">

            <div class="payment-item" data-name="rani amelia kamar 08 tower genap dp" data-status="waiting">
                <div class="payment-avatar">RA</div>

                <div class="payment-main">
                    <h3>Rani Amelia</h3>
                    <p>Kamar 08 · Tower Genap</p>

                    <div class="payment-meta">
                        <span class="payment-badge">Menunggu Verifikasi</span>
                        <span class="payment-date">Dikirim hari ini</span>
                    </div>
                </div>

                <a href="/admin/pembayaran/detail" class="payment-action">Cek Data</a>
            </div>

            <div class="payment-item" data-name="nadya putri kamar 01 tower ganjil lunas" data-status="verified">
                <div class="payment-avatar">NP</div>

                <div class="payment-main">
                    <h3>Nadya Putri</h3>
                    <p>Kamar 01 · Tower Ganjil</p>

                    <div class="payment-meta">
                        <span class="payment-badge">Terverifikasi</span>
                        <span class="payment-date">Dicek kemarin</span>
                    </div>
                </div>

                <a href="/admin/pembayaran/detail" class="payment-action">Cek Data</a>
            </div>

            <div class="payment-item" data-name="melati safira kamar 12 tower genap upload ulang" data-status="reupload">
                <div class="payment-avatar">MS</div>

                <div class="payment-main">
                    <h3>Melati Safira</h3>
                    <p>Kamar 12 · Tower Genap</p>

                    <div class="payment-meta">
                        <span class="payment-badge">Upload Ulang</span>
                        <span class="payment-date">Dikembalikan 2 hari lalu</span>
                    </div>
                </div>

                <a href="/admin/pembayaran/detail" class="payment-action">Cek Data</a>
            </div>

        </div>

        <div class="empty-payment" id="emptyPayment">
            <strong>Data pembayaran tidak ditemukan</strong>
            <span>Coba gunakan kata kunci atau filter yang lain.</span>
        </div>

    </div>

</div>

<script>
    const paymentSearch = document.getElementById('paymentSearch');
    const paymentItems = document.querySelectorAll('.payment-item');
    const paymentButtons = document.querySelectorAll('.payment-filter-btn');
    const emptyPayment = document.getElementById('emptyPayment');

    let activePaymentFilter = 'all';

    function applyPaymentFilter() {
        const keyword = paymentSearch.value.toLowerCase().trim();
        let visibleCount = 0;

        paymentItems.forEach(item => {
            const name = item.dataset.name;
            const status = item.dataset.status;

            const matchSearch = name.includes(keyword);
            const matchFilter = activePaymentFilter === 'all' || status === activePaymentFilter;

            if (matchSearch && matchFilter) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        emptyPayment.classList.toggle('show', visibleCount === 0);
    }

    paymentButtons.forEach(button => {
        button.addEventListener('click', function () {
            paymentButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            activePaymentFilter = this.dataset.filter;
            applyPaymentFilter();
        });
    });

    paymentSearch.addEventListener('input', applyPaymentFilter);
</script>

@endsection