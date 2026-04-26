@extends("layouts/main")

@section("content")
<section class="container-app py-8">
    <div class="bg-card border border-border/60 rounded-2xl p-6 shadow-card flex items-center gap-4">
        <span class="grid h-16 w-16 place-items-center rounded-full bg-gradient-primary text-primary-foreground text-2xl font-bold shadow-elevated">{{ Str::upper(substr(auth()->user()->nama, 0, 1)) }}</span>
        <div class="flex-1 min-w-0">
            <h1 class="text-xl font-bold truncate">{{ auth()->user()->nama }}</h1>
            <p class="text-sm text-muted-foreground truncate">{{ auth()->user()->email }}</p>
        </div>
        <a href="/logout"><button class="items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 hidden sm:inline-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out h-4 w-4">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" x2="9" y1="12" y2="12"></line>
            </svg>
            Logout
        </button></a>
    </div>
    <div class="max-w-4xl mx-auto">
        <div dir="ltr" data-orientation="horizontal" class="mt-6">
            <div role="tablist" aria-orientation="horizontal" class="items-center justify-between rounded-md bg-muted text-muted-foreground w-full sm:w-auto grid grid-cols-2 sm:flex sm:flex-row gap-1 h-auto p-1" tabindex="0" data-orientation="horizontal" style="outline: none;">
                <a href="/profile"><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r25:-content-account" data-state="inactive" id="radix-:r25:-trigger-account" class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 gap-1.5" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings h-4 w-4">
                        <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    Akun
                </button></a>
                <a href="/profile/data-diri"><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r25:-content-data" data-state="inactve" id="radix-:r25:-trigger-data" class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 gap-1.5" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user h-4 w-4">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Data Diri
                </button></a>
                <a href="/profile/status-pembayaran"><button type="button" role="tab" aria-selected="true" aria-controls="radix-:r25:-content-payments" data-state="active" id="radix-:r25:-trigger-payments" class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 gap-1.5" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-4 w-4">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                        <path d="M10 9H8"></path>
                        <path d="M16 13H8"></path>
                        <path d="M16 17H8"></path>
                    </svg>
                    Status Pembayaran
                </button></a>
                <a href="/profile/laporan-fasilitas"><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r25:-content-reports" data-state="inactive" id="radix-:r25:-trigger-reports" class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 gap-1.5" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wrench h-4 w-4">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                    </svg>
                    Laporan Fasilitas
                </button></a>
            </div>
            <div data-state="active" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r25:-trigger-account" id="radix-:r25:-content-account" tabindex="0" class="ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 mt-6 space-y-6" style="animation-duration: 0s;">
                <div class="bg-card border border-border/60 rounded-2xl p-5 shadow-card">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <h3 class="font-semibold">Kamar A1 — Standard</h3>
                            <p class="text-xs text-muted-foreground mt-0.5">ID R-1776687717196 · diajukan 20 April 2026</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border bg-secondary text-foreground border-border">Menunggu Pembayaran</div>
                        </div>
                    </div>
                    <div class="mt-4 grid sm:grid-cols-3 gap-3 text-sm">
                        <div class="rounded-lg bg-secondary p-3">
                            <p class="text-xs text-muted-foreground">Total Sewa</p>
                            <p class="font-semibold mt-0.5">Rp&nbsp;8.400.000</p>
                        </div>
                        <div class="rounded-lg bg-secondary p-3">
                            <p class="text-xs text-muted-foreground">Sudah Dibayar</p>
                            <p class="font-semibold mt-0.5">-</p>
                        </div>
                        <div class="rounded-lg bg-secondary p-3">
                            <p class="text-xs text-muted-foreground">Jatuh Tempo</p>
                            <p class="font-semibold mt-0.5">20 April 2027</p>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">Bayar Sekarang</button>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20terkait%20sewa%20Kamar%20A1%20%E2%80%94%20Standard%20(ID%20R-1776687717196)." target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-3.5 w-3.5">
                                <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                            </svg>
                            Hubungi Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 sm:hidden">
        <a href="/logout"><button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out h-4 w-4">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" x2="9" y1="12" y2="12"></line>
            </svg>
            Logout
        </button></a>
    </div>
</section>
@endsection

