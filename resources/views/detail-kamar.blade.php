@extends("layouts/detail")

@section("content")
<div class="container-app pt-6">
    <button class="inline-flex items-center gap-1.5 text-sm text-muted-foreground hover:text-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left h-4 w-4">
            <path d="m12 19-7-7 7-7"></path>
            <path d="M19 12H5"></path>
        </svg>
        Kembali
    </button>
</div>
<section class="container-app py-6 grid lg:grid-cols-5 gap-8">
    <div class="lg:col-span-3">
        <div class="aspect-[4/3] rounded-2xl overflow-hidden bg-muted shadow-card"><img src="3.jpg" alt="Kamar A1 — Standard foto 1" class="h-full w-full object-cover" width="1200" height="900"></div>
        <div class="mt-3 grid grid-cols-4 gap-3"><button class="aspect-[4/3] rounded-xl overflow-hidden border-2 transition-all border-primary shadow-soft"><img src="4.jpg" alt="" class="h-full w-full object-cover" loading="lazy"></button><button class="aspect-[4/3] rounded-xl overflow-hidden border-2 transition-all border-transparent opacity-70 hover:opacity-100"><img src="4.jpg" alt="" class="h-full w-full object-cover" loading="lazy"></button><button class="aspect-[4/3] rounded-xl overflow-hidden border-2 transition-all border-transparent opacity-70 hover:opacity-100"><img src="5.jpg" alt="" class="h-full w-full object-cover" loading="lazy"></button></div>
        <div class="mt-8 bg-card rounded-2xl border border-border/60 p-6 shadow-soft">
            <h2 class="font-semibold text-lg">Deskripsi Kamar</h2>
            <p class="text-sm text-muted-foreground mt-2 leading-relaxed">Kamar standar nyaman untuk satu orang. Cocok untuk pelajar atau pekerja yang mengutamakan kenyamanan dengan harga terjangkau. Sirkulasi udara baik dengan jendela besar.</p>
            <h3 class="font-semibold mt-6">Fasilitas</h3>
            <ul class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-2">
                <li class="flex items-center gap-2.5 text-sm">
                    <span class="h-6 w-6 rounded-full bg-accent/15 text-accent grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-3.5 w-3.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </span>
                    Kasur Single
                </li>
                <li class="flex items-center gap-2.5 text-sm">
                    <span class="h-6 w-6 rounded-full bg-accent/15 text-accent grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-3.5 w-3.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </span>
                    Lemari Kayu
                </li>
                <li class="flex items-center gap-2.5 text-sm">
                    <span class="h-6 w-6 rounded-full bg-accent/15 text-accent grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-3.5 w-3.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </span>
                    Meja Belajar
                </li>
                <li class="flex items-center gap-2.5 text-sm">
                    <span class="h-6 w-6 rounded-full bg-accent/15 text-accent grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-3.5 w-3.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </span>
                    Kipas Angin
                </li>
                <li class="flex items-center gap-2.5 text-sm">
                    <span class="h-6 w-6 rounded-full bg-accent/15 text-accent grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-3.5 w-3.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </span>
                    Wi-Fi
                </li>
                <li class="flex items-center gap-2.5 text-sm">
                    <span class="h-6 w-6 rounded-full bg-accent/15 text-accent grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check h-3.5 w-3.5">
                            <path d="M20 6 9 17l-5-5"></path>
                        </svg>
                    </span>
                    Jendela Ventilasi
                </li>
            </ul>
        </div>
    </div>
    <aside class="lg:col-span-2 lg:sticky lg:top-20 self-start space-y-4">
        <div class="bg-card rounded-2xl border border-border/60 shadow-card p-6">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h1 class="text-2xl font-bold leading-tight">Kamar A1 — Standard</h1>
                    <p class="text-sm text-muted-foreground mt-1 flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-3.5 w-3.5">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Kos Rumah Bata, Yogyakarta
                    </p>
                </div>
                <div class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 bg-success text-white border-0">Tersedia</div>
            </div>
            <div class="mt-5 grid grid-cols-2 gap-3">
                <div class="rounded-xl bg-secondary p-3">
                    <div class="flex items-center gap-2 text-xs text-muted-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind h-3.5 w-3.5">
                            <path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path>
                            <path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path>
                            <path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path>
                        </svg>
                        Tipe
                    </div>
                    <p class="font-semibold mt-1">Non AC</p>
                </div>
                <div class="rounded-xl bg-secondary p-3">
                    <div class="flex items-center gap-2 text-xs text-muted-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-maximize2 h-3.5 w-3.5">
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <polyline points="9 21 3 21 3 15"></polyline>
                            <line x1="21" x2="14" y1="3" y2="10"></line>
                            <line x1="3" x2="10" y1="21" y2="14"></line>
                        </svg>
                        Luas
                    </div>
                    <p class="font-semibold mt-1">3 x 3 m</p>
                </div>
            </div>
            <div class="mt-5 pt-5 border-t border-border">
                <p class="text-xs text-muted-foreground">Harga sewa</p>
                <p class="text-3xl font-bold text-primary mt-0.5">Rp&nbsp;8.400.000<span class="text-sm font-normal text-muted-foreground"> / tahun</span></p>
            </div>
            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 px-8 w-full mt-5 rounded-full shadow-elevated">Ajukan Sewa</button>
            <div class="mt-4 flex items-center gap-2 text-xs text-muted-foreground">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-4 w-4 text-accent">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                    <path d="m9 12 2 2 4-4"></path>
                </svg>
                Pengajuan aman &amp; data tersimpan rapi.
            </div>
        </div>
        <div class="bg-secondary/60 rounded-2xl p-5 text-sm">
            <p class="font-semibold">Butuh bantuan?</p>
            <p class="text-muted-foreground mt-1">Hubungi admin via WhatsApp untuk pertanyaan seputar kamar ini.</p>
            <a href="https://wa.me/6281234567890" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-3 w-full">Chat Admin</a>
        </div>
    </aside>
</section>
@endsection