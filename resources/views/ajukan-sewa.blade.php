@extends("layouts/main")

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
<section class="container-app py-6 grid lg:grid-cols-3 gap-6">
    <form class="lg:col-span-2 bg-card border border-border/60 rounded-2xl p-6 shadow-card space-y-5">
        <div>
            <h1 class="text-2xl font-bold">Form Pengajuan Sewa</h1>
            <p class="text-sm text-muted-foreground mt-1">Lengkapi data diri &amp; dokumen untuk mengajukan sewa.</p>
        </div>
        <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="fullName">Nama Lengkap *</label><input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" id="fullName" required="" value=""></div>
        <div>
            <p class="text-sm font-medium mb-1.5">Upload KTP <span class="text-destructive">*</span></p>
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
                        <p class="text-xs text-muted-foreground">Foto KTP yang jelas. Format: JPG/PNG/PDF.</p>
                    </div>
                </div>
            </button>
            <input type="file" accept=".pdf,.jpg,.jpeg,.png" class="hidden">
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
            <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="phone">No HP *</label><input type="tel" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" id="phone" required="" value=""></div>
            <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="emergencyPhone">No HP Orang Tua / Emergency *</label><input type="tel" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" id="emergencyPhone" required="" value=""></div>
        </div>
        <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="address">Alamat Domisili *</label><textarea class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="address" rows="3" required=""></textarea></div>
        <div>
            <p class="text-sm font-medium mb-1.5">Upload Surat Perjanjian <span class="text-destructive">*</span></p>
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
                        <p class="text-xs text-muted-foreground">Dokumen persetujuan sewa. Format: PDF/JPG/PNG.</p>
                    </div>
                </div>
            </button>
            <input type="file" accept=".pdf,.jpg,.jpeg,.png" class="hidden">
        </div>
        <div class="flex items-center gap-2 text-xs text-muted-foreground">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-4 w-4 text-accent">
                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                <path d="m9 12 2 2 4-4"></path>
            </svg>
            Data Anda aman dan hanya digunakan untuk proses sewa.
        </div>
        <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 px-8 w-full rounded-full" type="submit">Lanjut ke Pembayaran</button>
    </form>
    <aside class="bg-card border border-border/60 rounded-2xl p-5 shadow-soft self-start lg:sticky lg:top-20 space-y-4">
        <p class="text-sm font-semibold">Ringkasan Kamar</p>
        <div class="rounded-xl overflow-hidden aspect-[4/3] bg-muted"><img src="3.jpg" alt="Kamar A1 — Standard" class="h-full w-full object-cover"></div>
        <div>
            <h2 class="font-bold leading-tight">Kamar A1 — Standard</h2>
            <div class="flex items-center gap-2 mt-2">
                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80">Non AC</div>
                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80">3 x 3 m</div>
            </div>
        </div>
        <div class="pt-3 border-t border-border">
            <p class="text-xs text-muted-foreground">Harga sewa</p>
            <p class="text-2xl font-bold text-primary">Rp&nbsp;8.400.000<span class="text-sm font-normal text-muted-foreground"> / tahun</span></p>
        </div>
        <p class="text-xs text-muted-foreground">Status awal pengajuan: <span class="font-medium text-foreground">Pending</span></p>
    </aside>
</section>
    @endsection
