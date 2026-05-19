@extends("layouts/main")

@section("content")
<section class="flex-1">
    <div class="profile-wrapper">
        <div class="lg:hidden mb-4 flex items-center justify-between">
            <h1 class="text-lg font-bold">Status Pembayaran</h1>
            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:rg:" data-state="closed">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu h-4 w-4">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
                Menu
            </button>
        </div>
        <div class="profile-layout">
            @include('components.profile_sidebar')
            <main class="profile-content">
                <div class="space-y-4">

                    <div class="bg-card border border-border/60 rounded-2xl p-5 shadow-card">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Kamar B1 — Deluxe AC</h3>
                                <p class="text-xs text-muted-foreground mt-0.5">ID R-1777970464572 · diajukan 5 Mei 2026</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold border bg-destructive/15 text-destructive border-destructive/40">Upload Ulang</div>
                            </div>
                        </div>

                        <div class="mt-4 rounded-xl border border-warning/30 bg-warning/10 p-4 text-sm text-warning-foreground">
                            <div class="flex items-start gap-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-alert-circle shrink-0 mt-0.5 text-warning-foreground">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" x2="12" y1="8" y2="12"></line>
                                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                                </svg>
                                <div>
                                    <p class="font-bold text-amber-900">Catatan Admin (Upload Ulang Bukti Pembayaran):</p>
                                    <p class="mt-1 text-xs leading-relaxed text-amber-800">
                                        "Bukti transfer terpotong atau kurang jelas, harap unggah kembali struk resmi ATM/M-Banking yang mencantumkan nomor referensi bank secara utuh."
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 grid sm:grid-cols-3 gap-3 text-sm">
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Total Sewa</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;13.800.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Sudah Dibayar</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;6.900.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Jatuh Tempo</p>
                                <p class="font-semibold mt-0.5">5 Mei 2027</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="/pembayaran" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3 font-semibold shadow-soft">Upload Ulang Bukti</a>
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20terkait%20sewa%20Kamar%20B1%20%E2%80%94%20Deluxe%20AC%20(ID%20R-1777970464572)." target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-3.5 w-3.5">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                </svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>

                    <div class="bg-card border border-border/60 rounded-2xl p-5 shadow-card">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Kamar A1 — Standard</h3>
                                <p class="text-xs text-muted-foreground mt-0.5">ID R-1776694987139 · diajukan 20 April 2026</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold border bg-warning/15 text-warning-foreground border-warning/40">Menunggu Approval</div>
                            </div>
                        </div>
                        <div class="mt-4 grid sm:grid-cols-3 gap-3 text-sm">
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Total Sewa</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;8.400.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Sudah Dibayar</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;8.400.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Jatuh Tempo</p>
                                <p class="font-semibold mt-0.5">20 April 2027</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20terkait%20sewa%20Kamar%20A1%20%E2%80%94%20Standard%20(ID%20R-1776694987139)." target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-3.5 w-3.5">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                </svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>

                    <div class="bg-card border border-border/60 rounded-2xl p-5 shadow-card">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Kamar B2 — Deluxe AC</h3>
                                <p class="text-xs text-muted-foreground mt-0.5">ID R-1778392019483 · diajukan 1 Mei 2026</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold border bg-success/15 text-success border-success/40">DP Approved</div>
                            </div>
                        </div>
                        <div class="mt-4 grid sm:grid-cols-3 gap-3 text-sm">
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Total Sewa</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;13.800.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Sudah Dibayar</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;6.900.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Jatuh Tempo</p>
                                <p class="font-semibold mt-0.5">1 Mei 2027</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="/pelunasan" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">Bayar Pelunasan</a>
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20terkait%20sewa%20Kamar%20B2%20%E2%80%94%20Deluxe%20AC." target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-3.5 w-3.5">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                </svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>

                    <div class="bg-card border border-border/60 rounded-2xl p-5 shadow-card">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Kamar C1 — Deluxe AC Suite</h3>
                                <p class="text-xs text-muted-foreground mt-0.5">ID R-1779948201938 · diajukan 10 Mei 2026</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold border bg-success/15 text-success border-success/40">Approved</div>
                            </div>
                        </div>
                        <div class="mt-4 grid sm:grid-cols-3 gap-3 text-sm">
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Total Sewa</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;15.000.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Sudah Dibayar</p>
                                <p class="font-semibold text-green-600 mt-0.5">Rp&nbsp;15.000.000 (Lunas)</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Jatuh Tempo Perpanjang</p>
                                <p class="font-semibold mt-0.5">10 Mei 2027</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="/kamar/detail/pembayaran" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3 font-semibold shadow-soft">Perpanjang Sewa</a>

                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20terkait%20sewa%20Kamar%20C1%20%E2%80%94%20Deluxe%20AC%20Suite." target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-3.5 w-3.5">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                </svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>

                    <div class="bg-card border border-border/60 rounded-2xl p-5 shadow-card">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Kamar A2 — Standard</h3>
                                <p class="text-xs text-muted-foreground mt-0.5">ID R-1775549301940 · diajukan 15 April 2026</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold border bg-destructive/15 text-destructive border-destructive/40">Ditolak Sistem</div>
                            </div>
                        </div>
                        <div class="mt-4 grid sm:grid-cols-3 gap-3 text-sm">
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Total Sewa</p>
                                <p class="font-semibold mt-0.5">Rp&nbsp;8.400.000</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Sudah Dibayar</p>
                                <p class="font-semibold text-red-500 mt-0.5">Rp&nbsp;0 (Gagal)</p>
                            </div>
                            <div class="rounded-lg bg-secondary p-3">
                                <p class="text-xs text-muted-foreground">Status Kamar</p>
                                <p class="font-semibold mt-0.5">Dibatalkan</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="/kamar" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 font-medium">Pilih Kamar Kembali</a>
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20terkait%20pembatalan%20sewa%20Kamar%20A2%20%E2%80%94%20Standard." target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-3.5 w-3.5">
                                    <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                                </svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</section>
@endsection
