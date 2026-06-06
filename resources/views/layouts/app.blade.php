<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $siteLogo = \App\Models\Setting::where('key', 'site_logo')->value('value');
        $siteName = \App\Models\Setting::where('key', 'site_name')->value('value') ?? 'Piyoh Kopi';
        $whatsappSetting = \App\Models\Setting::where('key', 'whatsapp')->value('value');
    @endphp
    <title>@yield('title', 'Piyoh Kopi - Coffee, Slowbar, Pastry')</title>
    <meta name="description" content="@yield('meta_description', 'Coffee shop hangat untuk kopi, slowbar, pastry, dan suasana nyaman nongkrong atau nugas.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f7f2ea] text-stone-800 flex min-h-screen flex-col" style="font-family:'Plus Jakarta Sans',sans-serif;">
<header class="sticky top-0 z-50 border-b border-amber-100/80 bg-white/80 backdrop-blur-xl">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3 font-extrabold tracking-tight text-stone-900" style="font-family:'Outfit',sans-serif;">
            @if($siteLogo && file_exists(public_path($siteLogo)))
                <img src="{{ asset($siteLogo) }}" alt="{{ $siteName }}" class="h-11 w-auto">
            @else
                <span class="grid h-10 w-10 place-items-center rounded-2xl bg-amber-800 text-white">P</span>
                <span>{{ $siteName }}</span>
            @endif
        </a>
        <nav class="hidden items-center gap-8 text-sm font-medium md:flex">
            <a href="{{ route('home') }}" class="hover:text-amber-800 {{ request()->routeIs('home') ? 'text-amber-800' : 'text-stone-600' }}">Home</a>
            <a href="{{ route('about') }}" class="hover:text-amber-800 {{ request()->routeIs('about') ? 'text-amber-800' : 'text-stone-600' }}">About</a>
            <a href="{{ route('outlet.index') }}" class="hover:text-amber-800 {{ request()->routeIs('outlet.*') ? 'text-amber-800' : 'text-stone-600' }}">Outlet</a>
            <a href="{{ route('menu') }}" class="hover:text-amber-800 {{ request()->routeIs('menu') ? 'text-amber-800' : 'text-stone-600' }}">Menu</a>
            <a href="{{ route('careers') }}" class="hover:text-amber-800 {{ request()->routeIs('careers') ? 'text-amber-800' : 'text-stone-600' }}">Careers</a>
            <a href="{{ route('contact') }}" class="hover:text-amber-800 {{ request()->routeIs('contact') ? 'text-amber-800' : 'text-stone-600' }}">Contact</a>
        </nav>
        <button id="mobile-menu-button" class="rounded-xl p-2 text-stone-500 hover:bg-amber-50 hover:text-amber-800 md:hidden" aria-label="Open menu">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>
    <div id="mobile-menu" class="hidden border-t border-amber-100 bg-white md:hidden">
        <div class="space-y-1 px-4 py-3 text-sm font-medium">
            <a href="{{ route('home') }}" class="block rounded-xl px-3 py-2 {{ request()->routeIs('home') ? 'bg-amber-50 text-amber-800' : 'text-stone-600' }}">Home</a>
            <a href="{{ route('about') }}" class="block rounded-xl px-3 py-2 {{ request()->routeIs('about') ? 'bg-amber-50 text-amber-800' : 'text-stone-600' }}">About</a>
            <a href="{{ route('outlet.index') }}" class="block rounded-xl px-3 py-2 {{ request()->routeIs('outlet.*') ? 'bg-amber-50 text-amber-800' : 'text-stone-600' }}">Outlet</a>
            <a href="{{ route('menu') }}" class="block rounded-xl px-3 py-2 {{ request()->routeIs('menu') ? 'bg-amber-50 text-amber-800' : 'text-stone-600' }}">Menu</a>
            <a href="{{ route('careers') }}" class="block rounded-xl px-3 py-2 {{ request()->routeIs('careers') ? 'bg-amber-50 text-amber-800' : 'text-stone-600' }}">Careers</a>
            <a href="{{ route('contact') }}" class="block rounded-xl px-3 py-2 {{ request()->routeIs('contact') ? 'bg-amber-50 text-amber-800' : 'text-stone-600' }}">Contact</a>
        </div>
    </div>
</header>
<main class="flex-1">@yield('content')</main>
<footer class="border-t border-amber-100 bg-white">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 py-12 sm:px-6 lg:grid-cols-3 lg:px-8">
        <div>
            <div class="mb-4 flex items-center gap-3 font-extrabold text-stone-900" style="font-family:'Outfit',sans-serif;">
                @if($siteLogo && file_exists(public_path($siteLogo)))
                    <img src="{{ asset($siteLogo) }}" alt="{{ $siteName }}" class="h-10 w-auto">
                @else
                    <span class="grid h-10 w-10 place-items-center rounded-2xl bg-amber-800 text-white">P</span>
                @endif
                <span>{{ $siteName }}</span>
            </div>
            <p class="max-w-sm text-sm leading-6 text-stone-600">Coffee shop hangat untuk kopi, slowbar, pastry, dan suasana nyaman nongkrong atau nugas.</p>
        </div>
        <div>
            <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-stone-500">Outlet</h3>
            <div class="space-y-2 text-sm text-stone-600">
                <p>Piyoh Kopi Galaxy</p>
                <p>Piyoh Kopi Bekasi</p>
            </div>
        </div>
        <div>
            <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-stone-500">Kontak</h3>
            <div class="space-y-2 text-sm text-stone-600">
                @if($whatsappSetting)
                    <a class="block hover:text-amber-800" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsappSetting) }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                @endif
                <a class="block hover:text-amber-800" href="https://instagram.com/piyohkopi" target="_blank" rel="noopener noreferrer">Instagram</a>
            </div>
        </div>
    </div>
</footer>
<script>
const btn = document.getElementById('mobile-menu-button');
const menu = document.getElementById('mobile-menu');
if (btn && menu) {
    btn.addEventListener('click', () => menu.classList.toggle('hidden'));
}
</script>
</body>
</html>
