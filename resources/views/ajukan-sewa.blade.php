@extends("layouts/main")

@section("content")
<div class="container-app pt-6">
    <a href="/kamar/{id}" class="inline-flex items-center gap-1.5 text-sm text-muted-foreground hover:text-foreground">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left h-4 w-4">
            <path d="m12 19-7-7 7-7"></path>
            <path d="M19 12H5"></path>
        </svg>
        Kembali
    </a>
</div>
<section class="container-app py-6 grid lg:grid-cols-3 gap-6">
    <form class="lg:col-span-2 bg-card border border-border/60 rounded-2xl p-6 shadow-card space-y-5">
        <div>
            <h1 class="text-2xl font-bold">Form Pengajuan Sewa</h1>
            <p class="text-sm text-muted-foreground mt-1">Lengkapi data diri &amp; dokumen untuk mengajukan sewa.</p>
        </div>

        <div class="space-y-1.5">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="fullName">Nama Lengkap <span class="text-destructive">*</span></label>
            <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" id="fullName" required="" value="">
        </div>

        <div class="space-y-1.5">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="residentType">Tipe Penghuni <span class="text-destructive">*</span></label>
            <div class="relative">
                <select class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 pr-10 text-muted-foreground"
                        style="-webkit-appearance: none; -moz-appearance: none; appearance: none;"
                        id="residentType" required="" onchange="this.classList.toggle('text-muted-foreground', this.value === '').classList.toggle('text-foreground', this.value !== '')">
                    <option value="" disabled selected hidden>Pilih tipe penghuni</option>
                    <option value="mahasiswi" class="text-foreground">Mahasiswi</option>
                    <option value="umum" class="text-foreground">Umum</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-muted-foreground">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </div>
            </div>
        </div>

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
            <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="phone">No HP <span class="text-destructive">*</span></label><input type="tel" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" id="phone" required="" value=""></div>
            <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="emergencyPhone">No HP Orang Tua / Emergency <span class="text-destructive">*</span></label><input type="tel" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" id="emergencyPhone" required="" value=""></div>
        </div>

        <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="address">Alamat Domisili <span class="text-destructive">*</span></label><textarea class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="address" rows="3" required=""></textarea></div>

        <div class="space-y-3">
            <div>
                <p class="text-sm font-medium">Surat Komitmen<span class="text-destructive">*</span></p>
                <p class="text-xs text-muted-foreground mt-0.5">Unduh berkas template, isi dan tanda tangani, kemudian unggah kembali di bawah ini.</p>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3.5 border border-primary/20 bg-primary-soft/10 rounded-xl">
                <div class="flex items-start gap-2.5 min-w-0">
                    <span class="p-2 rounded-lg bg-primary/10 text-primary mt-0.5 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-4 w-4">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                            <path d="M10 9H8"></path>
                            <path d="M16 13H8"></path>
                            <path d="M16 17H8"></path>
                        </svg>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold truncate text-foreground">Template Surat Komitmen</p>
                        <p class="text-xs text-muted-foreground mt-0.5">Tipe berkas: .docx</p>
                    </div>
                </div>
                <a href="{{ asset('Surat-Komitmen.docx') }}" download class="inline-flex items-center justify-center gap-1.5 whitespace-nowrap rounded-lg text-xs font-semibold ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-primary text-primary-foreground hover:bg-primary/90 h-8 px-3 shadow-soft shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download h-3.5 w-3.5">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" x2="12" y1="3" y2="15"></line>
                    </svg>
                    Unduh Template
                </a>
            </div>

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
                        <p class="text-sm font-medium truncate">Klik untuk pilih file surat komitmen</p>
                        <p class="text-xs text-muted-foreground">Format yang didukung: PDF/JPG/PNG.</p>
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

        <a href="/kamar/detail/pembayaran" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 px-8 w-full rounded-full" type="submit">Lanjut ke Pembayaran</a>
    </form>

    <aside class="bg-card border border-border/60 rounded-2xl p-5 shadow-soft self-start lg:sticky lg:top-20 space-y-4">
        <p class="text-sm font-semibold">Ringkasan Kamar</p>
        <div class="rounded-xl overflow-hidden aspect-[4/3] bg-muted"><img src="{{ asset('3.jpg') }}" alt="Kamar A1 — Standard" class="h-full w-full object-cover"></div>
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
