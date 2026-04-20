@extends("layouts/main")

@section("content")
<section class="relative overflow-hidden">
    <div class="container-app pt-12 pb-12 md:pt-16 md:pb-16 grid lg:grid-cols-2 gap-10 items-center">
        <div class="animate-fade-up">
            <span class="inline-flex items-center gap-2 rounded-full bg-primary-soft text-primary px-3.5 py-1.5 text-xs font-semibold">About Us</span>
            <h1 class="mt-5 text-4xl md:text-5xl font-bold leading-tight tracking-tight">Kos <span class="text-primary">Rumah Bata</span></h1>
            <p class="mt-4 text-base md:text-lg text-muted-foreground max-w-lg">Hunian kos modern bernuansa hangat di tengah Yogyakarta. Dirancang untuk pelajar dan profesional muda yang mencari kenyamanan, keamanan, dan komunitas yang sehat.</p>
            <div class="mt-7 flex flex-wrap gap-3">
                <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-full px-7" href="/kamar">
                    Lihat Kamar 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-1 h-4 w-4">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
                <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-full px-7" href="/activity">Berita Terbaru</a>
            </div>
        </div>
        <div class="relative animate-fade-up" style="animation-delay: 120ms;">
            <div class="aspect-[4/3] rounded-3xl overflow-hidden shadow-elevated"><img src="1.jpg" alt="Bangunan Kos Rumah Bata" class="h-full w-full object-cover" width="1280" height="896"></div>
        </div>
    </div>
    <div class="absolute inset-0 -z-10 bg-gradient-warm"></div>
</section>
<section class="container-app py-14">
    <div class="max-w-3xl">
        <p class="text-sm font-semibold text-primary uppercase tracking-wide">Tentang Kami</p>
        <h2 class="text-3xl md:text-4xl font-bold mt-2">Tempat tinggal yang terasa seperti rumah.</h2>
        <p class="mt-4 text-muted-foreground leading-relaxed">Kos Rumah Bata berdiri sejak 2019 dengan konsep "rumah kedua" — bangunan bata ekspos yang hangat, ruang komunal yang luas, serta sistem manajemen digital yang transparan. Kami percaya hunian yang baik bukan hanya soal kamar, tapi juga soal komunitas dan kemudahan.</p>
    </div>
    <div class="mt-10 grid md:grid-cols-3 gap-5">
        <div class="bg-card rounded-2xl p-6 border border-border/60 shadow-soft">
            <div class="h-11 w-11 rounded-xl bg-primary-soft text-primary grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart h-5 w-5">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                </svg>
            </div>
            <h3 class="mt-4 font-semibold text-lg">Konsep</h3>
            <p class="mt-1.5 text-sm text-muted-foreground">Hunian hangat ala rumah dengan sentuhan modern. Privasi dan kebersamaan seimbang.</p>
        </div>
        <div class="bg-card rounded-2xl p-6 border border-border/60 shadow-soft">
            <div class="h-11 w-11 rounded-xl bg-primary-soft text-primary grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-target h-5 w-5">
                    <circle cx="12" cy="12" r="10"></circle>
                    <circle cx="12" cy="12" r="6"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                </svg>
            </div>
            <h3 class="mt-4 font-semibold text-lg">Visi</h3>
            <p class="mt-1.5 text-sm text-muted-foreground">Menjadi kos digital paling terpercaya di Yogyakarta dengan pengalaman penghuni terbaik.</p>
        </div>
        <div class="bg-card rounded-2xl p-6 border border-border/60 shadow-soft">
            <div class="h-11 w-11 rounded-xl bg-primary-soft text-primary grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles h-5 w-5">
                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                    <path d="M20 3v4"></path>
                    <path d="M22 5h-4"></path>
                    <path d="M4 17v2"></path>
                    <path d="M5 18H3"></path>
                </svg>
            </div>
            <h3 class="mt-4 font-semibold text-lg">Misi</h3>
            <p class="mt-1.5 text-sm text-muted-foreground">Menyediakan hunian aman, nyaman, transparan, dan terjangkau untuk semua kalangan.</p>
        </div>
    </div>
</section>
<section class="container-app py-10 pb-16">
    <div class="flex items-end justify-between mb-8 gap-4 flex-wrap">
        <div>
            <p class="text-sm font-semibold text-primary uppercase tracking-wide">Galeri</p>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">Suasana di Kos Rumah Bata</h2>
            <p class="text-muted-foreground mt-2 max-w-lg">Foto kamar, lingkungan, dan aktivitas penghuni.</p>
        </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 row-span-2 aspect-[3/4]"><img src="2.jpg" alt="Kamar standard" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 aspect-square"><img src="2.jpg" alt="Kamar deluxe AC" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 aspect-square"><img src="3.jpg" alt="Dapur bersama" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 aspect-square"><img src="6.jpg" alt="Taman kos" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 aspect-square"><img src="5.jpg" alt="Area parkir" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 row-span-2 aspect-[3/4]"><img src="1.jpg" alt="Kamar tipe lain" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 aspect-square"><img src="5.jpg" alt="Kamar premium" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
        <div class="overflow-hidden rounded-2xl shadow-card border border-border/40 aspect-square"><img src="1.jpg" alt="Aktivitas penghuni" loading="lazy" class="h-full w-full object-cover hover:scale-105 transition-transform duration-500"></div>
    </div>
</section>
@endsection