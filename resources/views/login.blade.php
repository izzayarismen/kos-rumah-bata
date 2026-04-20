@extends("layouts/main")

@section("content")

<main class="flex-1 grid place-items-center py-12">
    <div class="w-full max-w-md mx-auto px-4">
        <div class="text-center mb-6">
            <span class="inline-grid h-12 w-12 place-items-center rounded-xl bg-gradient-primary text-primary-foreground shadow-elevated">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house h-5 w-5">
                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                    <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                </svg>
            </span>
            <h1 class="text-2xl font-bold mt-3">Selamat Datang Kembali</h1>
            <p class="text-sm text-muted-foreground mt-1">Masuk untuk lanjut mengajukan sewa.</p>
        </div>
        <form class="bg-card border border-border/60 rounded-2xl p-6 shadow-card space-y-4">
            <div class="space-y-1.5">
                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="email">Email</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <input type="email" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pl-9" id="email" placeholder="kamu@email.com" required="" value="">
                </div>
            </div>
            <div class="space-y-1.5">
                <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="password">Password</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input type="password" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pl-9" id="password" placeholder="••••••••" required="" value="">
                </div>
            </div>
            <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 px-8 w-full rounded-full" type="submit">Login</button>
            <p class="text-center text-sm text-muted-foreground">Belum punya akun? <a class="text-primary font-medium hover:underline" href="/register">Daftar</a></p>
        </form>
    </div>
</main>
@endsection