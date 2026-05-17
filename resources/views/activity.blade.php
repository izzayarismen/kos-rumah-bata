@extends("layouts/main")

@section("content")

<section class="container-app py-8 md:py-10 flex-1">
    <div class="mx-auto max-w-2xl">
        <div class="mb-5">
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Beranda</h1>
            <p class="text-sm text-muted-foreground mt-1">Update terbaru dari Kos Rumah Bata</p>
        </div>
        <div class="sticky top-16 z-20 -mx-4 px-4 bg-background/85 backdrop-blur border-b border-border/60">
            <div class="flex gap-1 overflow-x-auto no-scrollbar py-2"><button class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-primary text-primary-foreground">Semua</button><button class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-secondary text-foreground hover:bg-muted">Info Kamar</button><button class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-secondary text-foreground hover:bg-muted">Update Kos</button><button class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-secondary text-foreground hover:bg-muted">Aktivitas</button><button class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-secondary text-foreground hover:bg-muted">Promo</button><button class="shrink-0 px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-secondary text-foreground hover:bg-muted">Social</button></div>
        </div>
        <ul class="divide-y divide-border/60">
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">2 jam lalu</span>
                            <span class="ml-auto text-[11px] font-medium text-primary inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles h-3 w-3">
                                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                                    <path d="M20 3v4"></path>
                                    <path d="M22 5h-4"></path>
                                    <path d="M4 17v2"></path>
                                    <path d="M5 18H3"></path>
                                </svg>
                                Disematkan
                            </span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-warning/15 text-warning-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles h-3 w-3">
                                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                                    <path d="M20 3v4"></path>
                                    <path d="M22 5h-4"></path>
                                    <path d="M4 17v2"></path>
                                    <path d="M5 18H3"></path>
                                </svg>
                                Promo
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Promo khusus penghuni baru bulan ini 🎉 Diskon 10% untuk pembayaran 3 bulan di muka. Berlaku sampai akhir bulan, DM admin untuk klaim ya!</p>
                    </div>
                </div>
            </li>
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">8 jam lalu</span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-primary-soft text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double h-3 w-3">
                                    <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"></path>
                                    <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"></path>
                                    <path d="M12 4v6"></path>
                                    <path d="M2 18h20"></path>
                                </svg>
                                Info Kamar
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Kamar A2 (Standard Non-AC) sudah tersedia bulan ini! Cocok buat kamu yang cari kos nyaman dengan harga ramah kantong. Booking lebih awal yuk sebelum diambil orang ✨</p>
                        <div class="mt-3 overflow-hidden rounded-2xl border border-border/60"><img src="4.jpg" alt="" loading="lazy" class="w-full max-h-[420px] object-cover"></div>
                        <div class="mt-3"><a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-full" href="/kamar">Lihat kamar</a></div>
                    </div>
                </div>
            </li>
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">1 hari lalu</span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-accent/15 text-accent-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-3 w-3">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Aktivitas
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Makan malam bersama penghuni semalam seru banget! Menu nasi liwet &amp; ayam bakar ludes dalam 30 menit 😄 Terima kasih buat semua yang ikut meramaikan.</p>
                        <div class="mt-3 overflow-hidden rounded-2xl border border-border/60"><img src="5.jpg" alt="" loading="lazy" class="w-full max-h-[420px] object-cover"></div>
                    </div>
                </div>
            </li>
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">2 hari lalu</span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-muted text-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-megaphone h-3 w-3">
                                    <path d="m3 11 18-5v12L3 14v-3z"></path>
                                    <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                                </svg>
                                Update Kos
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Renovasi dapur bersama selesai! Sekarang ada kompor induksi tambahan, microwave baru, dan area cuci piring yang lebih luas. Selamat masak-masak 🍳</p>
                        <div class="mt-3 overflow-hidden rounded-2xl border border-border/60"><img src="1.jpg" alt="" loading="lazy" class="w-full max-h-[420px] object-cover"></div>
                    </div>
                </div>
            </li>
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">3 hari lalu</span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-secondary text-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram h-3 w-3">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                </svg>
                                Social
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Jangan lupa follow Instagram @kosrumahbata ya! Ada update event, promo, dan keseharian kos yang sayang dilewatkan 📸</p>
                        <div class="mt-3"><a href="https://instagram.com" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 px-3 rounded-full">Follow Instagram</a></div>
                    </div>
                </div>
            </li>
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">5 hari lalu</span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-muted text-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-megaphone h-3 w-3">
                                    <path d="m3 11 18-5v12L3 14v-3z"></path>
                                    <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                                </svg>
                                Update Kos
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Wi-Fi seluruh area kos sudah diupgrade ke 200 Mbps 🚀 Cocok buat WFH, meeting online, sampai marathon film weekend ini.</p>
                        <div class="mt-3 overflow-hidden rounded-2xl border border-border/60"><img src="6.jpg" alt="" loading="lazy" class="w-full max-h-[420px] object-cover"></div>
                    </div>
                </div>
            </li>
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">1 mgg lalu</span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-accent/15 text-accent-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-3 w-3">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Aktivitas
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Kerja bakti &amp; menata ulang taman belakang minggu lalu. Sekarang ada spot duduk baru buat ngopi sore. Mampir ya! 🌿</p>
                    </div>
                </div>
            </li>
            <li class="py-4 px-1 hover:bg-muted/30 transition-colors rounded-lg">
                <div class="flex gap-3">
                    <div class="shrink-0">
                        <div class="h-11 w-11 rounded-full bg-gradient-primary text-primary-foreground grid place-items-center font-bold shadow-soft">KB</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="font-semibold text-sm">Kos Rumah Bata</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check h-4 w-4 text-primary">
                                <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="text-muted-foreground text-sm">@kosrumahbata</span><span class="text-muted-foreground text-sm">·</span><span class="text-muted-foreground text-sm">1 mgg lalu</span>
                        </div>
                        <div class="mt-1 flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full bg-primary-soft text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bed-double h-3 w-3">
                                    <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8"></path>
                                    <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4"></path>
                                    <path d="M12 4v6"></path>
                                    <path d="M2 18h20"></path>
                                </svg>
                                Info Kamar
                            </span>
                        </div>
                        <p class="mt-2 text-sm leading-relaxed whitespace-pre-line text-foreground">Reminder: pembayaran sewa bulan ini paling lambat tanggal 5. Bisa via transfer atau QRIS, bukti bayar diupload langsung dari halaman Profile.</p>
                    </div>
                </div>
            </li>
        </ul>
        <div class="py-10 text-center text-sm text-muted-foreground">Kamu sudah sampai akhir feed ✨</div>
    </div>
</section>

<a href="https://wa.me/6281234567890?text=Halo%20Admin%20Kos%20Rumah%20Bata%2C%20saya%20ingin%20bertanya%20mengenai%20ketersediaan%20kamar." target="_blank" rel="noreferrer" class="transition-all duration-300 hover:scale-110" style="position: fixed !important; bottom: 24px !important; right: 24px !important; z-index: 999999 !important; display: flex !important; height: 56px !important; width: 56px !important; align-items: center !important; justify-content: center !important; border-radius: 50% !important; background-color: #CD6D4D !important; color: white !important; box-shadow: 0 8px 30px rgba(205, 109, 77, 0.5) !important;" aria-label="Hubungi Admin via WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle">
        <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
    </svg>
</a>
@endsection