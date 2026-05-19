@extends("layouts/main")

@section("content")
<section class="flex-1">
    <div class="profile-wrapper">
        <div class="lg:hidden mb-4 flex items-center justify-between">
            <h1 class="text-lg font-bold">Laporan Fasilitas</h1>
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
                <div class="space-y-6">
                    <div class="bg-card border border-border/60 rounded-2xl p-6 shadow-card space-y-4">
                        <h2 class="font-semibold">Buat Laporan</h2>
                        <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Nomor Kamar</label><input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" placeholder="Mis. A1" value=""></div>
                        <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Deskripsi</label><textarea class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" rows="3" placeholder="Jelaskan masalah fasilitas..."></textarea></div>
                        <div>
                            <p class="text-sm font-medium mb-1.5">Foto (opsional) </p>
                            <button type="button" class="w-full rounded-xl border-2 border-dashed p-4 text-left transition-colors border-border hover:border-primary hover:bg-primary-soft/30">
                                <div class="flex items-center gap-3">
                                    <span class="h-10 w-10 grid place-items-center rounded-lg bg-secondary text-muted-foreground">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload h-5 w-5">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" x2="12" y1="3" y2="15"></line>
                                        </svg>
                                    </span>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium truncate">Klik untuk pilih file</p>
                                        <p class="text-xs text-muted-foreground">Format: PDF, JPG, PNG (maks 5MB)</p>
                                    </div>
                                </div>
                            </button>
                            <input type="file" accept=".jpg,.jpeg,.png" class="hidden">
                        </div>
                        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">Kirim Laporan</button>
                    </div>
                    <div>
                        <h2 class="font-semibold mb-3">Riwayat Laporan</h2>
                        <div class="space-y-3">
                            <div class="bg-card border border-border/60 rounded-xl p-4 shadow-soft">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="font-medium">Kamar A1</p>
                                        <p class="text-sm text-muted-foreground mt-1">Kran airnya bocor</p>
                                        <p class="text-xs text-muted-foreground mt-2">5 Mei 2026</p>
                                    </div>
                                    <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border bg-secondary text-foreground border-border">Dikirim</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
@endsection

