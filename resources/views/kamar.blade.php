@extends("layouts/main")

@section("content")

<section class="bg-gradient-warm border-b border-border/60">
    <div class="container-app py-12">
        <p class="text-sm font-semibold text-primary uppercase tracking-wide">Daftar Kamar</p>
        <h1 class="text-3xl md:text-4xl font-bold mt-2">Pilih kamar yang sesuai untukmu</h1>
        <p class="text-muted-foreground mt-2 max-w-xl">Tersedia berbagai tipe kamar dengan fasilitas lengkap. Pilih sesuai kebutuhan dan budgetmu.</p>
    </div>
</section>
<section class="container-app py-8">
    <div class="bg-card rounded-2xl border border-border/60 shadow-soft p-4 md:p-5 flex flex-col gap-4">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
            </svg>
            <input class="flex w-full border border-input px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pl-10 h-11 rounded-xl bg-background" placeholder="Cari nama kamar..." value="">
        </div>
        <div class="flex flex-wrap gap-2"><button class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors bg-primary text-primary-foreground border-primary shadow-soft">Semua Status</button><button class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors bg-surface text-foreground/70 border-border hover:border-primary/40 hover:text-foreground">Tersedia</button><button class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors bg-surface text-foreground/70 border-border hover:border-primary/40 hover:text-foreground">Penuh</button><span class="mx-2 hidden sm:inline-block w-px bg-border"></span><button class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors bg-primary text-primary-foreground border-primary shadow-soft">Semua Tipe</button><button class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors bg-surface text-foreground/70 border-border hover:border-primary/40 hover:text-foreground">AC</button><button class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors bg-surface text-foreground/70 border-border hover:border-primary/40 hover:text-foreground">Non AC</button></div>
    </div>
    <div class="flex items-center justify-between mt-6 mb-4">
        <p class="text-sm text-muted-foreground">Menampilkan <span class="font-semibold text-foreground">6</span> dari 6 kamar</p>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <article class="group bg-card rounded-2xl overflow-hidden shadow-card border border-border/60 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1 flex flex-col">
            <div class="relative aspect-[4/3] overflow-hidden bg-muted">
            <img src="3.jpg" alt="Kamar A1 — Standard" loading="lazy" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute top-3 left-3 flex gap-2">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 gap-1 bg-surface/95 backdrop-blur text-foreground border-0 shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind h-3 w-3">
                        <path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path>
                        <path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path>
                        <path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path>
                    </svg>
                    Non AC
                </div>
            </div>
            <div class="absolute top-3 right-3">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 bg-success text-white border-0 shadow-soft">Tersedia</div>
            </div>
            </div>
            <div class="p-5 flex flex-col flex-1">
            <h3 class="font-semibold text-lg leading-snug">Kamar A1 — Standard</h3>
            <p class="text-xs text-muted-foreground mt-1">Luas 3 x 3 m</p>
            <div class="mt-4 mb-5">
                <p class="text-xs text-muted-foreground">Mulai dari</p>
                <p class="text-xl font-bold text-primary">Rp&nbsp;8.400.000<span class="text-xs font-normal text-muted-foreground"> / tahun</span></p>
            </div>
            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-auto w-full group/btn" href="/kamar/kamar-a1">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1 h-4 w-4 group-hover/btn:translate-x-0.5 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
            </div>
        </article>
        <article class="group bg-card rounded-2xl overflow-hidden shadow-card border border-border/60 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1 flex flex-col">
            <div class="relative aspect-[4/3] overflow-hidden bg-muted">
            <img src="4.jpg" alt="Kamar A2 — Standard" loading="lazy" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute top-3 left-3 flex gap-2">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 gap-1 bg-surface/95 backdrop-blur text-foreground border-0 shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind h-3 w-3">
                        <path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path>
                        <path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path>
                        <path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path>
                    </svg>
                    Non AC
                </div>
            </div>
            <div class="absolute top-3 right-3">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 bg-foreground/85 text-background border-0 shadow-soft">Penuh</div>
            </div>
            </div>
            <div class="p-5 flex flex-col flex-1">
            <h3 class="font-semibold text-lg leading-snug">Kamar A2 — Standard</h3>
            <p class="text-xs text-muted-foreground mt-1">Luas 3 x 3 m</p>
            <p class="text-xs text-warning mt-2">Tersedia kembali: Agustus 2025</p>
            <div class="mt-4 mb-5">
                <p class="text-xs text-muted-foreground">Mulai dari</p>
                <p class="text-xl font-bold text-primary">Rp&nbsp;8.400.000<span class="text-xs font-normal text-muted-foreground"> / tahun</span></p>
            </div>
            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-auto w-full group/btn" href="/kamar/kamar-a2">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1 h-4 w-4 group-hover/btn:translate-x-0.5 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
            </div>
        </article>
        <article class="group bg-card rounded-2xl overflow-hidden shadow-card border border-border/60 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1 flex flex-col">
            <div class="relative aspect-[4/3] overflow-hidden bg-muted">
            <img src="5.jpg" alt="Kamar B1 — Deluxe AC" loading="lazy" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute top-3 left-3 flex gap-2">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 gap-1 bg-surface/95 backdrop-blur text-foreground border-0 shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake h-3 w-3">
                        <line x1="2" x2="22" y1="12" y2="12"></line>
                        <line x1="12" x2="12" y1="2" y2="22"></line>
                        <path d="m20 16-4-4 4-4"></path>
                        <path d="m4 8 4 4-4 4"></path>
                        <path d="m16 4-4 4-4-4"></path>
                        <path d="m8 20 4-4 4 4"></path>
                    </svg>
                    AC
                </div>
            </div>
            <div class="absolute top-3 right-3">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 bg-success text-white border-0 shadow-soft">Tersedia</div>
            </div>
            </div>
            <div class="p-5 flex flex-col flex-1">
            <h3 class="font-semibold text-lg leading-snug">Kamar B1 — Deluxe AC</h3>
            <p class="text-xs text-muted-foreground mt-1">Luas 3.5 x 4 m</p>
            <div class="mt-4 mb-5">
                <p class="text-xs text-muted-foreground">Mulai dari</p>
                <p class="text-xl font-bold text-primary">Rp&nbsp;13.800.000<span class="text-xs font-normal text-muted-foreground"> / tahun</span></p>
            </div>
            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-auto w-full group/btn" href="/kamar/kamar-b1">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1 h-4 w-4 group-hover/btn:translate-x-0.5 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
            </div>
        </article>
        <article class="group bg-card rounded-2xl overflow-hidden shadow-card border border-border/60 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1 flex flex-col">
            <div class="relative aspect-[4/3] overflow-hidden bg-muted">
            <img src="3.jpg" alt="Kamar B2 — Deluxe AC" loading="lazy" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute top-3 left-3 flex gap-2">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 gap-1 bg-surface/95 backdrop-blur text-foreground border-0 shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake h-3 w-3">
                        <line x1="2" x2="22" y1="12" y2="12"></line>
                        <line x1="12" x2="12" y1="2" y2="22"></line>
                        <path d="m20 16-4-4 4-4"></path>
                        <path d="m4 8 4 4-4 4"></path>
                        <path d="m16 4-4 4-4-4"></path>
                        <path d="m8 20 4-4 4 4"></path>
                    </svg>
                    AC
                </div>
            </div>
            <div class="absolute top-3 right-3">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 bg-success text-white border-0 shadow-soft">Tersedia</div>
            </div>
            </div>
            <div class="p-5 flex flex-col flex-1">
            <h3 class="font-semibold text-lg leading-snug">Kamar B2 — Deluxe AC</h3>
            <p class="text-xs text-muted-foreground mt-1">Luas 3.5 x 4 m</p>
            <div class="mt-4 mb-5">
                <p class="text-xs text-muted-foreground">Mulai dari</p>
                <p class="text-xl font-bold text-primary">Rp&nbsp;13.800.000<span class="text-xs font-normal text-muted-foreground"> / tahun</span></p>
            </div>
            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-auto w-full group/btn" href="/kamar/kamar-b2">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1 h-4 w-4 group-hover/btn:translate-x-0.5 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
            </div>
        </article>
        <article class="group bg-card rounded-2xl overflow-hidden shadow-card border border-border/60 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1 flex flex-col">
            <div class="relative aspect-[4/3] overflow-hidden bg-muted">
            <img src="4.jpg" alt="Kamar C1 — Standard" loading="lazy" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute top-3 left-3 flex gap-2">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 gap-1 bg-surface/95 backdrop-blur text-foreground border-0 shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind h-3 w-3">
                        <path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path>
                        <path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path>
                        <path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path>
                    </svg>
                    Non AC
                </div>
            </div>
            <div class="absolute top-3 right-3">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 bg-foreground/85 text-background border-0 shadow-soft">Penuh</div>
            </div>
            </div>
            <div class="p-5 flex flex-col flex-1">
            <h3 class="font-semibold text-lg leading-snug">Kamar C1 — Standard</h3>
            <p class="text-xs text-muted-foreground mt-1">Luas 3 x 3 m</p>
            <p class="text-xs text-warning mt-2">Tersedia kembali: Juni 2025</p>
            <div class="mt-4 mb-5">
                <p class="text-xs text-muted-foreground">Mulai dari</p>
                <p class="text-xl font-bold text-primary">Rp&nbsp;8.400.000<span class="text-xs font-normal text-muted-foreground"> / tahun</span></p>
            </div>
            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-auto w-full group/btn" href="/kamar/kamar-c1">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1 h-4 w-4 group-hover/btn:translate-x-0.5 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
            </div>
        </article>
        <article class="group bg-card rounded-2xl overflow-hidden shadow-card border border-border/60 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1 flex flex-col">
            <div class="relative aspect-[4/3] overflow-hidden bg-muted">
            <img src="5.jpg" alt="Kamar C2 — Deluxe AC" loading="lazy" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute top-3 left-3 flex gap-2">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 gap-1 bg-surface/95 backdrop-blur text-foreground border-0 shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-snowflake h-3 w-3">
                        <line x1="2" x2="22" y1="12" y2="12"></line>
                        <line x1="12" x2="12" y1="2" y2="22"></line>
                        <path d="m20 16-4-4 4-4"></path>
                        <path d="m4 8 4 4-4 4"></path>
                        <path d="m16 4-4 4-4-4"></path>
                        <path d="m8 20 4-4 4 4"></path>
                    </svg>
                    AC
                </div>
            </div>
            <div class="absolute top-3 right-3">
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 bg-success text-white border-0 shadow-soft">Tersedia</div>
            </div>
            </div>
            <div class="p-5 flex flex-col flex-1">
            <h3 class="font-semibold text-lg leading-snug">Kamar C2 — Deluxe AC</h3>
            <p class="text-xs text-muted-foreground mt-1">Luas 3.5 x 4 m</p>
            <div class="mt-4 mb-5">
                <p class="text-xs text-muted-foreground">Mulai dari</p>
                <p class="text-xl font-bold text-primary">Rp&nbsp;13.800.000<span class="text-xs font-normal text-muted-foreground"> / tahun</span></p>
            </div>
            <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-auto w-full group/btn" href="/kamar/kamar-c2">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1 h-4 w-4 group-hover/btn:translate-x-0.5 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
            </div>
        </article>
    </div>
</section>
@endsection