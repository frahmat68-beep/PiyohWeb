<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $siteLogo = \App\Models\Setting::where('key', 'site_logo')->value('value');
        $siteName = \App\Models\Setting::where('key', 'site_name')->value('value') ?? 'Piyoh Kopi';
        $whatsappSetting = \App\Models\Setting::where('key', 'whatsapp')->value('value') ?? \App\Models\Setting::where('key', 'contact_phone')->value('value');
    @endphp
    <title>@yield('title', 'Piyoh Kopi - Coffee, Slowbar, Ambience')</title>
    <meta name="description" content="@yield('meta_description', 'Coffee shop hangat untuk kopi berkualitas, slowbar, pastry, dan suasana nyaman untuk berkumpul atau bekerja.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF7F2] text-[#22261E] flex min-h-screen flex-col selection:bg-[#475638] selection:text-white" style="font-family:'Plus Jakarta Sans',sans-serif;">
<header class="sticky top-0 z-50 border-b border-[#EBE4D8]/80 bg-[#FAF7F2]/95 backdrop-blur-md transition-all duration-200">
    <div class="mx-auto flex h-20 max-w-7xl 2xl:max-w-[1600px] items-center justify-between px-4 sm:px-6 lg:px-10 2xl:px-16">
        <a href="{{ route('home') }}" class="group flex items-center gap-3 transition-transform duration-200 hover:scale-[1.01]">
            @if($siteLogo && file_exists(public_path($siteLogo)))
                <img src="{{ asset($siteLogo) }}" alt="{{ $siteName }}" class="h-10 sm:h-12 w-auto object-contain">
            @else
                <span class="grid h-10 w-10 place-items-center rounded-2xl bg-[#475638] text-white shadow-sm font-serif font-bold text-lg">P</span>
                <span class="text-xl font-bold tracking-tight text-[#22261E] font-serif">{{ $siteName }}</span>
            @endif
        </a>
        <nav class="hidden items-center gap-1 lg:gap-2 text-sm font-medium md:flex">
            <a href="{{ route('home') }}" class="px-4 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('home') ? 'bg-[#475638] text-white font-semibold shadow-sm' : 'text-[#575E50] hover:text-[#22261E] hover:bg-[#F3ECE1]' }}">Home</a>
            <a href="{{ route('about') }}" class="px-4 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('about') ? 'bg-[#475638] text-white font-semibold shadow-sm' : 'text-[#575E50] hover:text-[#22261E] hover:bg-[#F3ECE1]' }}">About</a>
            <a href="{{ route('outlet.index') }}" class="px-4 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('outlet.*') ? 'bg-[#475638] text-white font-semibold shadow-sm' : 'text-[#575E50] hover:text-[#22261E] hover:bg-[#F3ECE1]' }}">Outlet</a>
            <a href="{{ route('menu') }}" class="px-4 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('menu') ? 'bg-[#475638] text-white font-semibold shadow-sm' : 'text-[#575E50] hover:text-[#22261E] hover:bg-[#F3ECE1]' }}">Menu</a>
            <a href="{{ route('careers') }}" class="px-4 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('careers') ? 'bg-[#475638] text-white font-semibold shadow-sm' : 'text-[#575E50] hover:text-[#22261E] hover:bg-[#F3ECE1]' }}">Careers</a>
            <a href="{{ route('contact') }}" class="px-4 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('contact') ? 'bg-[#475638] text-white font-semibold shadow-sm' : 'text-[#575E50] hover:text-[#22261E] hover:bg-[#F3ECE1]' }}">Contact</a>
        </nav>
        <button id="mobile-menu-button" class="touch-target-44 flex items-center justify-center rounded-xl p-2.5 text-[#575E50] hover:bg-[#F3ECE1] hover:text-[#22261E] md:hidden transition" aria-label="Open menu">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>
    <div id="mobile-menu" class="hidden border-t border-[#EBE4D8] bg-[#FAF7F2] md:hidden px-4 py-4 space-y-1">
        <a href="{{ route('home') }}" class="block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('home') ? 'bg-[#475638] text-white' : 'text-[#575E50] hover:bg-[#F3ECE1]' }}">Home</a>
        <a href="{{ route('about') }}" class="block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('about') ? 'bg-[#475638] text-white' : 'text-[#575E50] hover:bg-[#F3ECE1]' }}">About</a>
        <a href="{{ route('outlet.index') }}" class="block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('outlet.*') ? 'bg-[#475638] text-white' : 'text-[#575E50] hover:bg-[#F3ECE1]' }}">Outlet</a>
        <a href="{{ route('menu') }}" class="block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('menu') ? 'bg-[#475638] text-white' : 'text-[#575E50] hover:bg-[#F3ECE1]' }}">Menu</a>
        <a href="{{ route('careers') }}" class="block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('careers') ? 'bg-[#475638] text-white' : 'text-[#575E50] hover:bg-[#F3ECE1]' }}">Careers</a>
        <a href="{{ route('contact') }}" class="block rounded-xl px-4 py-3 text-sm font-medium {{ request()->routeIs('contact') ? 'bg-[#475638] text-white' : 'text-[#575E50] hover:bg-[#F3ECE1]' }}">Contact</a>
    </div>
</header>

<main class="flex-1">@yield('content')</main>

<footer class="border-t border-[#2B3329] bg-[#161A14] text-[#B2BBAE]">
    <div class="mx-auto grid max-w-7xl 2xl:max-w-[1600px] gap-10 px-4 py-16 sm:px-6 lg:grid-cols-4 lg:px-10 2xl:px-16">
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center gap-3">
                @if($siteLogo && file_exists(public_path($siteLogo)))
                    <img src="{{ asset($siteLogo) }}" alt="{{ $siteName }}" class="h-10 w-auto brightness-200">
                @else
                    <span class="grid h-10 w-10 place-items-center rounded-2xl bg-[#475638] text-white font-serif font-bold">P</span>
                    <span class="text-xl font-bold tracking-tight text-[#F5F2EB] font-serif">{{ $siteName }}</span>
                @endif
            </div>
            <p class="max-w-md text-sm leading-relaxed text-[#8E9789]">Ruang hangat untuk menikmati racikan kopi istimewa nusantara, pastry artisanal, dan suasana santai yang menenangkan.</p>
            <p class="text-xs text-[#7E877A] italic font-serif">"Brew for joyful living."</p>
        </div>
        <div>
            <h3 class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#C4823F]">Outlet Kami</h3>
            <div class="space-y-2.5 text-sm">
                @php
                    $footerOutlets = \App\Models\Outlet::where('is_active', true)->orderBy('sort_order')->get();
                @endphp
                @forelse($footerOutlets as $fOutlet)
                    <a href="{{ route('outlet.show', $fOutlet->slug) }}" class="block text-[#B2BBAE] hover:text-white transition duration-150 py-1">{{ $fOutlet->name }}</a>
                @empty
                    <p class="text-[#7E877A]">Piyoh Kopi Galaxy</p>
                @endforelse
            </div>
        </div>
        <div>
            <h3 class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#C4823F]">Hubungi Kami</h3>
            <div class="space-y-2.5 text-sm">
                @if($whatsappSetting)
                    <a class="flex items-center gap-2 text-[#B2BBAE] hover:text-white transition duration-150 py-1" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsappSetting) }}" target="_blank" rel="noopener noreferrer">
                        <span>WhatsApp Official</span>
                    </a>
                @endif
                <a class="flex items-center gap-2 text-[#B2BBAE] hover:text-white transition duration-150 py-1" href="https://instagram.com/piyohkopi" target="_blank" rel="noopener noreferrer">
                    <span>Instagram @piyohkopi</span>
                </a>
            </div>
        </div>
    </div>
    <div class="border-t border-[#232920] py-6 text-center text-xs text-[#6F776B]">
        <p>&copy; {{ date('Y') }} {{ $siteName }}. Seluruh hak cipta dilindungi undang-undang.</p>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    if (btn && menu) {
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));
    }

    // Scroll reveal observer
    const reveals = document.querySelectorAll('.reveal-on-scroll');
    if ('IntersectionObserver' in window && reveals.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.02,
            rootMargin: '0px 0px 80px 0px'
        });

        reveals.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight + 100) {
                el.classList.add('reveal-visible');
            } else {
                observer.observe(el);
            }
        });
    } else {
        reveals.forEach(el => el.classList.add('reveal-visible'));
    }
});
</script>
</body>
</html>
