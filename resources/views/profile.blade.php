@extends("layouts/main")

@section("content")
<section class="flex-1">
    <div class="profile-wrapper">
        <div class="lg:hidden mb-4 flex items-center justify-between">
            <h1 class="text-lg font-bold">Data Diri</h1>
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
                    <div class="bg-card border border-border/60 rounded-2xl p-6 shadow-card">
                        <h2 class="font-semibold mb-4">Profil Saya</h2>
                        <div class="space-y-6">
                            <div class="bg-card border border-border/60 rounded-2xl p-6 shadow-card">
                                <div class="flex items-center justify-between mb-5">
                                    <div>
                                        <h2 class="font-semibold">Data Diri Penghuni</h2>
                                    </div>
                                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil h-3.5 w-3.5">
                                            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"></path>
                                            <path d="m15 5 4 4"></path>
                                        </svg>
                                        Edit
                                    </button>
                                </div>
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div class="space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Nama Lengkap</label>
                                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" disabled="" value="Izza Yarismen">
                                    </div>
                                    <div class="space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Email</label>
                                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" disabled="" value="izzayarismennn@gmail.com">
                                    </div>

                                    <div class="space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">No HP</label>
                                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" disabled="" value="081234567890">
                                    </div>
                                    <div class="space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Jenis Kelamin</label>
                                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" disabled="" value="Perempuan">
                                    </div>

                                    <div class="sm:col-span-2 space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Tipe Penghuni</label>
                                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" disabled="" value="Mahasiswi">
                                    </div>

                                    <div class="sm:col-span-2 space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Alamat Asal (Sesuai KTP)</label>
                                        <textarea class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" rows="3" disabled="">Padang, West Sumatra</textarea>
                                    </div>

                                    <div class="sm:col-span-2 space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">No. Telepon Kontak Darurat (Orang Tua / Wali)</label>
                                        <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" disabled="" value="085211223344">
                                    </div>

                                    <div class="sm:col-span-2 space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Dokumen KTP</label>
                                        <div class="flex items-center gap-3 p-3 border border-input bg-secondary/30 rounded-md text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text text-muted-foreground h-4 w-4 shrink-0">
                                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                            </svg>
                                            <span class="flex-1 truncate text-foreground font-medium">ktp_izza_yarismen.png</span>
                                            <a href="#" class="text-xs font-semibold text-primary hover:underline">Lihat Dokumen</a>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2 space-y-1.5">
                                        <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Dokumen Surat Komitmen</label>
                                        <div class="flex items-center gap-3 p-3 border border-input bg-secondary/30 rounded-md text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text text-muted-foreground h-4 w-4 shrink-0">
                                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                            </svg>
                                            <span class="flex-1 truncate text-foreground font-medium">surat_komitmen_izza.pdf</span>
                                            <a href="#" class="text-xs font-semibold text-primary hover:underline">Lihat Dokumen</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="bg-card border border-border/60 rounded-2xl p-6 shadow-card">
                                <h2 class="font-semibold mb-4">Ubah Password</h2>
                                <div class="grid sm:grid-cols-3 gap-4">
                                    <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Password Lama</label><input type="password" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" value=""></div>
                                    <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Password Baru</label><input type="password" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" value=""></div>
                                    <div class="space-y-1.5"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Konfirmasi</label><input type="password" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm" value=""></div>
                                </div>
                                <div class="mt-4"><button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">Update Password</button></div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
</section>
@endsection
