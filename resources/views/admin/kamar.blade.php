@extends('admin.layout')

@section('page-title', 'Data Kamar')
@section('page-subtitle', 'Kelola kamar yang tampil pada halaman pelanggan.')

@section('content')

<style>
    .room-page {
        display: grid;
        gap: 22px;
    }

    .room-panel {
        background: #ffffff;
        border: 1px solid #ead6ce;
        border-radius: 26px;
        padding: 28px;
    }

    .room-panel-header {
        margin-bottom: 22px;
    }

    .room-panel-header h2 {
        margin: 0;
        font-size: 27px;
        font-weight: 700;
        color: #211713;
        letter-spacing: -0.02em;
    }

    .room-panel-header p {
        margin: 8px 0 0;
        color: #86766f;
        font-size: 15px;
        line-height: 1.6;
    }

    .room-toolbar {
        display: grid;
        gap: 14px;
        margin-bottom: 24px;
    }

    .room-toolbar-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .room-search {
        width: 420px;
        max-width: 100%;
    }

    .room-search input {
        width: 100%;
        height: 48px;
        border: 1px solid #ead6ce;
        border-radius: 15px;
        padding: 0 16px;
        font-size: 14px;
        color: #211713;
        font-family: inherit;
        outline: none;
        background: #ffffff;
    }

    .room-search input:focus {
        border-color: #d79b86;
        box-shadow: 0 0 0 4px rgba(200, 102, 74, 0.08);
    }

    .room-add-btn {
        text-decoration: none;
        border: 1px solid #c8664a;
        background: #c8664a;
        color: #ffffff;
        padding: 13px 18px;
        border-radius: 15px;
        font-size: 14px;
        font-weight: 600;
        font-family: inherit;
        transition: 0.2s ease;
        white-space: nowrap;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .room-add-btn:hover {
        background: #b75a41;
    }

    .room-actions {
        display: flex;
        align-items: center;
        gap: 9px;
        flex-wrap: wrap;
    }

    .filter-btn {
        border: 1px solid #ead6ce;
        background: #fbf5f1;
        color: #7a5d52;
        padding: 11px 16px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .filter-btn:hover {
        background: #f4ddd4;
        color: #c8664a;
    }

    .filter-btn.active {
        background: #211713;
        border-color: #211713;
        color: #ffffff;
    }

    .room-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }

    .room-card {
        border: 1px solid #ead6ce;
        border-radius: 22px;
        overflow: hidden;
        background: #ffffff;
        transition: 0.2s ease;
    }

    .room-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 35px rgba(80, 48, 31, 0.08);
        border-color: #dfc6ba;
    }

    .room-image {
        height: 210px;
        position: relative;
        overflow: hidden;
        background: #f6eee8;
    }

    .room-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .room-badges {
        position: absolute;
        top: 14px;
        left: 14px;
        right: 14px;
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .room-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 32px;
        padding: 7px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.94);
        color: #6f625c;
        backdrop-filter: blur(8px);
    }

    .room-chip.available {
        color: #2e8b45;
        background: rgba(229, 247, 232, 0.95);
    }

    .room-chip.full {
        color: #8a5a4b;
        background: rgba(250, 241, 237, 0.95);
    }

    .room-body {
        padding: 20px;
    }

    .room-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 14px;
    }

    .room-name {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #211713;
        line-height: 1.25;
        letter-spacing: -0.02em;
    }

    .room-type {
        margin: 6px 0 0;
        color: #86766f;
        font-size: 14px;
    }

    .room-number {
        background: #fbf5f1;
        color: #7a5d52;
        border: 1px solid #eee1da;
        border-radius: 12px;
        padding: 8px 10px;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
    }

    .room-price {
        margin-top: 16px;
        padding: 13px 0;
        border-top: 1px solid #f0e3dd;
        border-bottom: 1px solid #f0e3dd;
    }

    .room-price strong {
        color: #211713;
        font-size: 19px;
        font-weight: 600;
        letter-spacing: -0.01em;
    }

    .room-detail {
        margin-top: 16px;
        display: grid;
        gap: 12px;
    }

    .room-detail-row {
        display: flex;
        justify-content: space-between;
        gap: 14px;
        align-items: flex-start;
    }

    .room-detail-row span {
        color: #9a8d85;
        font-size: 13px;
        min-width: 72px;
    }

    .room-detail-row strong {
        color: #211713;
        font-size: 13px;
        font-weight: 500;
        text-align: right;
        line-height: 1.5;
    }

    .facility-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        justify-content: flex-end;
    }

    .facility-tags b {
        display: inline-flex;
        padding: 6px 9px;
        border-radius: 999px;
        background: #fffaf7;
        border: 1px solid #eee1da;
        color: #4b403b;
        font-size: 12px;
        font-weight: 500;
    }

    .room-footer {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-top: 18px;
    }

    .room-footer a,
    .room-footer button {
        border: none;
        border-radius: 14px;
        padding: 13px 14px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .edit-btn {
        background: #c8664a;
        color: #ffffff;
    }

    .edit-btn:hover {
        background: #b75a41;
    }

    .delete-btn {
        background: #f4ddd4;
        color: #c0392b;
    }

    .delete-btn:hover {
        background: #ef4136;
        color: white;
    }

    .empty-state {
        display: none;
        text-align: center;
        padding: 45px 20px;
        border: 1px dashed #ead6ce;
        border-radius: 20px;
        color: #86766f;
        background: #fffdfb;
        margin-top: 18px;
    }

    .empty-state.show {
        display: block;
    }

    .empty-state strong {
        display: block;
        color: #211713;
        font-size: 18px;
        margin-bottom: 8px;
    }

    @media (max-width: 1200px) {
        .room-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 820px) {
        .room-panel {
            padding: 22px;
        }

        .room-toolbar-top {
            flex-direction: column;
            align-items: stretch;
        }

        .room-search,
        .room-add-btn {
            width: 100%;
        }

        .room-actions {
            width: 100%;
            justify-content: flex-start;
        }

        .room-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 520px) {
        .room-panel-header h2 {
            font-size: 24px;
        }

        .room-image {
            height: 190px;
        }

        .room-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .filter-btn {
            width: 100%;
            text-align: center;
            justify-content: center;
        }

        .room-detail-row {
            flex-direction: column;
            gap: 8px;
        }

        .room-detail-row strong {
            text-align: left;
        }

        .facility-tags {
            justify-content: flex-start;
        }

        .room-footer {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="room-page">
    <div class="room-panel">

        <div class="room-panel-header">
            <h2>Daftar Kamar</h2>
            <p>Kelola kamar berdasarkan nomor, tower, tipe kamar, status, fasilitas, dan harga sewa.</p>
        </div>

        <div class="room-toolbar">
            <div class="room-toolbar-top">
                <div class="room-search">
                    <input type="text" id="roomSearch" placeholder="Cari nomor kamar atau tower...">
                </div>

                <a href="/admin/kamar/create" class="room-add-btn">Tambah Kamar</a>
            </div>

            <div class="room-actions">
                <button type="button" class="filter-btn active" data-filter="all">Semua</button>
                <button type="button" class="filter-btn" data-filter="tersedia">Tersedia</button>
                <button type="button" class="filter-btn" data-filter="penuh">Penuh</button>
                <button type="button" class="filter-btn" data-filter="non-ac">Non AC</button>
                <button type="button" class="filter-btn" data-filter="ac">AC</button>
            </div>
        </div>

        <div class="room-grid" id="roomGrid">

            <div class="room-card" data-name="kamar 01 tower ganjil non ac tersedia" data-status="tersedia" data-type="non-ac">
                <div class="room-image">
                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=900&q=80" alt="Kamar 01">

                    <div class="room-badges">
                        <span class="room-chip">Non AC</span>
                        <span class="room-chip available">Tersedia</span>
                    </div>
                </div>

                <div class="room-body">
                    <div class="room-top">
                        <div>
                            <h3 class="room-name">Kamar 01</h3>
                            <p class="room-type">Tower Ganjil · Non AC</p>
                        </div>

                        <span class="room-number">01</span>
                    </div>

                    <div class="room-price">
                        <strong>Rp 8.400.000/tahun</strong>
                    </div>

                    <div class="room-detail">
                        <div class="room-detail-row">
                            <span>Luas</span>
                            <strong>3 × 3 meter</strong>
                        </div>

                        <div class="room-detail-row">
                            <span>Fasilitas</span>

                            <div class="facility-tags">
                                <b>Kasur</b>
                                <b>Lemari</b>
                                <b>KM Dalam</b>
                            </div>
                        </div>
                    </div>

                    <div class="room-footer">
                        <a href="/admin/kamar/edit" class="edit-btn">Edit</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete()">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="room-card" data-name="kamar 02 tower genap ac tersedia" data-status="tersedia" data-type="ac">
                <div class="room-image">
                    <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=900&q=80" alt="Kamar 02">

                    <div class="room-badges">
                        <span class="room-chip">AC</span>
                        <span class="room-chip available">Tersedia</span>
                    </div>
                </div>

                <div class="room-body">
                    <div class="room-top">
                        <div>
                            <h3 class="room-name">Kamar 02</h3>
                            <p class="room-type">Tower Genap · AC</p>
                        </div>

                        <span class="room-number">02</span>
                    </div>

                    <div class="room-price">
                        <strong>Rp 13.800.000/tahun</strong>
                    </div>

                    <div class="room-detail">
                        <div class="room-detail-row">
                            <span>Luas</span>
                            <strong>3 × 3 meter</strong>
                        </div>

                        <div class="room-detail-row">
                            <span>Fasilitas</span>

                            <div class="facility-tags">
                                <b>Kasur</b>
                                <b>Lemari</b>
                                <b>KM Dalam</b>
                                <b>AC</b>
                            </div>
                        </div>
                    </div>

                    <div class="room-footer">
                        <a href="/admin/kamar/edit" class="edit-btn">Edit</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete()">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="room-card" data-name="kamar 03 tower ganjil non ac penuh" data-status="penuh" data-type="non-ac">
                <div class="room-image">
                    <img src="https://images.unsplash.com/photo-1560448204-603b3fc33ddc?auto=format&fit=crop&w=900&q=80" alt="Kamar 03">

                    <div class="room-badges">
                        <span class="room-chip">Non AC</span>
                        <span class="room-chip full">Penuh</span>
                    </div>
                </div>

                <div class="room-body">
                    <div class="room-top">
                        <div>
                            <h3 class="room-name">Kamar 03</h3>
                            <p class="room-type">Tower Ganjil · Non AC</p>
                        </div>

                        <span class="room-number">03</span>
                    </div>

                    <div class="room-price">
                        <strong>Rp 8.400.000/tahun</strong>
                    </div>

                    <div class="room-detail">
                        <div class="room-detail-row">
                            <span>Luas</span>
                            <strong>3 × 3 meter</strong>
                        </div>

                        <div class="room-detail-row">
                            <span>Fasilitas</span>

                            <div class="facility-tags">
                                <b>Kasur</b>
                                <b>Lemari</b>
                                <b>KM Dalam</b>
                            </div>
                        </div>
                    </div>

                    <div class="room-footer">
                        <a href="/admin/kamar/edit" class="edit-btn">Edit</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete()">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="room-card" data-name="kamar 04 tower genap ac tersedia" data-status="tersedia" data-type="ac">
                <div class="room-image">
                    <img src="https://images.unsplash.com/photo-1615874694520-474822394e73?auto=format&fit=crop&w=900&q=80" alt="Kamar 04">

                    <div class="room-badges">
                        <span class="room-chip">AC</span>
                        <span class="room-chip available">Tersedia</span>
                    </div>
                </div>

                <div class="room-body">
                    <div class="room-top">
                        <div>
                            <h3 class="room-name">Kamar 04</h3>
                            <p class="room-type">Tower Genap · AC</p>
                        </div>

                        <span class="room-number">04</span>
                    </div>

                    <div class="room-price">
                        <strong>Rp 13.800.000/tahun</strong>
                    </div>

                    <div class="room-detail">
                        <div class="room-detail-row">
                            <span>Luas</span>
                            <strong>3 × 3 meter</strong>
                        </div>

                        <div class="room-detail-row">
                            <span>Fasilitas</span>

                            <div class="facility-tags">
                                <b>Kasur</b>
                                <b>Lemari</b>
                                <b>KM Dalam</b>
                                <b>AC</b>
                            </div>
                        </div>
                    </div>

                    <div class="room-footer">
                        <a href="/admin/kamar/edit" class="edit-btn">Edit</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete()">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="room-card" data-name="kamar 05 tower ganjil non ac tersedia" data-status="tersedia" data-type="non-ac">
                <div class="room-image">
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?auto=format&fit=crop&w=900&q=80" alt="Kamar 05">

                    <div class="room-badges">
                        <span class="room-chip">Non AC</span>
                        <span class="room-chip available">Tersedia</span>
                    </div>
                </div>

                <div class="room-body">
                    <div class="room-top">
                        <div>
                            <h3 class="room-name">Kamar 05</h3>
                            <p class="room-type">Tower Ganjil · Non AC</p>
                        </div>

                        <span class="room-number">05</span>
                    </div>

                    <div class="room-price">
                        <strong>Rp 8.400.000/tahun</strong>
                    </div>

                    <div class="room-detail">
                        <div class="room-detail-row">
                            <span>Luas</span>
                            <strong>3 × 3 meter</strong>
                        </div>

                        <div class="room-detail-row">
                            <span>Fasilitas</span>

                            <div class="facility-tags">
                                <b>Kasur</b>
                                <b>Lemari</b>
                                <b>KM Dalam</b>
                            </div>
                        </div>
                    </div>

                    <div class="room-footer">
                        <a href="/admin/kamar/edit" class="edit-btn">Edit</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete()">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="room-card" data-name="kamar 06 tower genap ac penuh" data-status="penuh" data-type="ac">
                <div class="room-image">
                    <img src="https://images.unsplash.com/photo-1560185127-6ed189bf02f4?auto=format&fit=crop&w=900&q=80" alt="Kamar 06">

                    <div class="room-badges">
                        <span class="room-chip">AC</span>
                        <span class="room-chip full">Penuh</span>
                    </div>
                </div>

                <div class="room-body">
                    <div class="room-top">
                        <div>
                            <h3 class="room-name">Kamar 06</h3>
                            <p class="room-type">Tower Genap · AC</p>
                        </div>

                        <span class="room-number">06</span>
                    </div>

                    <div class="room-price">
                        <strong>Rp 13.800.000/tahun</strong>
                    </div>

                    <div class="room-detail">
                        <div class="room-detail-row">
                            <span>Luas</span>
                            <strong>3 × 3 meter</strong>
                        </div>

                        <div class="room-detail-row">
                            <span>Fasilitas</span>

                            <div class="facility-tags">
                                <b>Kasur</b>
                                <b>Lemari</b>
                                <b>KM Dalam</b>
                                <b>AC</b>
                            </div>
                        </div>
                    </div>

                    <div class="room-footer">
                        <a href="/admin/kamar/edit" class="edit-btn">Edit</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete()">Hapus</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="empty-state" id="emptyState">
            <strong>Kamar tidak ditemukan</strong>
            <span>Coba gunakan kata kunci atau filter yang lain.</span>
        </div>

    </div>
</div>

<script>
    const filterButtons = document.querySelectorAll('.filter-btn');
    const roomCards = document.querySelectorAll('.room-card');
    const roomSearch = document.getElementById('roomSearch');
    const emptyState = document.getElementById('emptyState');

    let activeFilter = 'all';

    function applyRoomFilter() {
        const keyword = roomSearch.value.toLowerCase().trim();
        let visibleCount = 0;

        roomCards.forEach(card => {
            const name = card.dataset.name;
            const status = card.dataset.status;
            const type = card.dataset.type;

            const matchSearch = name.includes(keyword);
            const matchFilter =
                activeFilter === 'all' ||
                status === activeFilter ||
                type === activeFilter;

            if (matchSearch && matchFilter) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        emptyState.classList.toggle('show', visibleCount === 0);
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            activeFilter = this.dataset.filter;
            applyRoomFilter();
        });
    });

    roomSearch.addEventListener('input', applyRoomFilter);
</script>

@endsection