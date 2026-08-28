@extends('layouts.app')
@section('title', $page->meta_title ?? 'Piyoh Kopi - Coffee, Slowbar, Ambience')
@section('meta_description', $page->meta_description ?? 'Coffee shop hangat untuk kopi, slowbar, pastry, dan suasana nyaman nongkrong atau nugas.')
@section('content')
@php
    $bannerImage = $heroBanner?->getFirstMediaUrl('image');
@endphp

{{-- Hero Section --}}
<div class="relative overflow-hidden bg-[#161A14] text-white">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity" style="background-image:url('{{ $bannerImage ?: 'https://images.unsplash.com/photo-1507133750040-4a8f57021571?q=80&w=1400' }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#161A14] via-[#161A14]/85 to-transparent"></div>
    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 py-24 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-32 items-center">
        <div>
            <span class="inline-flex items-center gap-2 rounded-full border border-[#475638]/60 bg-[#475638]/20 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#C4823F]">
                Coffee • Slowbar • Ambience
            </span>
            <h1 class="mt-6 max-w-2xl text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.15] tracking-tight font-serif text-[#FAF7F2]">{{ $sections['hero_title'] ?? 'Ruang Hangat untuk Kopi dan Santai' }}</h1>
            <p class="mt-6 max-w-xl text-base sm:text-lg leading-relaxed text-[#B2BBAE]">{{ $sections['hero_subtitle'] ?? 'Nikmati racikan kopi istimewa, pastry artisanal, dan suasana santai yang menenangkan di outlet Piyoh Kopi.' }}</p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('menu') }}" class="rounded-full bg-[#475638] hover:bg-[#36422A] px-7 py-3.5 text-sm font-semibold text-white transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">Lihat Menu</a>
                @if($primaryOutlet && $primaryOutlet->google_maps_url)
                    <a href="{{ $primaryOutlet->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="rounded-full border border-[#EBE4D8]/30 bg-white/5 hover:bg-white/15 px-7 py-3.5 text-sm font-semibold text-[#FAF7F2] transition-all duration-200 backdrop-blur-sm">Buka Maps</a>
                @else
                    <a href="{{ route('outlet.show', 'galaxy') }}" class="rounded-full border border-[#EBE4D8]/30 bg-white/5 hover:bg-white/15 px-7 py-3.5 text-sm font-semibold text-[#FAF7F2] transition-all duration-200 backdrop-blur-sm">Detail Outlet</a>
                @endif
            </div>
            <p class="mt-5 text-xs sm:text-sm text-[#889180] flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#C4823F]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Untuk dine-in, pemesanan dilakukan mandiri melalui QR code yang tersedia di meja outlet.
            </p>
        </div>
        <div class="grid gap-4 rounded-3xl border border-white/10 bg-[#222920]/60 p-6 backdrop-blur-md sm:grid-cols-2 shadow-2xl">
            <div class="rounded-2xl border border-white/5 bg-white/5 p-5">
                <p class="text-xs uppercase tracking-[0.2em] text-[#C4823F] font-semibold">Lokasi Utama</p>
                <p class="mt-2 text-lg font-bold text-[#FAF7F2] font-serif">Galaxy Bekasi</p>
                <p class="mt-1 text-xs text-[#889180]">Grand Galaxy City, RGA No. 7</p>
            </div>
            <div class="rounded-2xl border border-white/5 bg-white/5 p-5">
                <p class="text-xs uppercase tracking-[0.2em] text-[#C4823F] font-semibold">Jam Operasional</p>
                <p class="mt-2 text-lg font-bold text-[#FAF7F2] font-serif">08:00 - 23:30</p>
                <p class="mt-1 text-xs text-[#889180]">Buka setiap hari</p>
            </div>
            <div class="rounded-2xl border border-white/5 bg-[#161A14]/80 p-5 sm:col-span-2">
                <p class="text-xs uppercase tracking-[0.2em] text-[#B2BBAE]">Eksplorasi Cepat</p>
                <div class="mt-3 flex flex-wrap gap-3">
                    <a href="{{ route('menu') }}" class="rounded-full bg-[#FAF7F2] hover:bg-white px-5 py-2.5 text-xs font-bold text-[#22261E] transition">Katalog Menu</a>
                    <a href="{{ route('outlet.index') }}" class="rounded-full border border-[#475638] bg-[#475638]/30 hover:bg-[#475638]/50 px-5 py-2.5 text-xs font-semibold text-[#FAF7F2] transition">Daftar Outlet</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- About Teaser Section --}}
<div class="bg-[#FAF7F2] py-20 lg:py-28 border-b border-[#EBE4D8]">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8 items-center">
        <div>
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#475638]">Filosofi & Suasana</span>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold text-[#22261E] font-serif leading-snug">Rasa, suasana, dan tempat yang pas untuk singgah.</h2>
            <p class="mt-5 text-base sm:text-lg leading-relaxed text-[#575E50]">{{ $sections['about_preview'] ?? 'Piyoh Kopi menghadirkan kopi yang hangat, suasana yang nyaman, dan menu yang mudah dijelajahi.' }}</p>
            <div class="mt-8">
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#475638] hover:text-[#36422A] transition">
                    <span>Pelajari selengkapnya tentang kami</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=600" class="h-64 sm:h-80 w-full rounded-3xl object-cover shadow-md transition-transform duration-300 hover:scale-[1.02]" alt="Coffee preparation">
            <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=600" class="h-64 sm:h-80 w-full rounded-3xl object-cover shadow-md transition-transform duration-300 hover:scale-[1.02] sm:mt-6" alt="Coffee shop ambience">
        </div>
    </div>
</div>

{{-- Featured Menu Section --}}
<div class="bg-[#F3ECE1] py-20 lg:py-28 border-b border-[#EBE4D8]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#C4823F]">Favorit Pengunjung</p>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-[#22261E] font-serif">Menu Pilihan</h2>
            </div>
            <a href="{{ route('menu') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#475638] hover:text-[#36422A] transition">
                <span>Lihat semua menu</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($featuredMenuItems as $item)
                @php 
                    $image = $item->getImageUrl(); 
                    $isPlaceholder = $item->isUsingPlaceholderImage();
                @endphp
                <div class="group overflow-hidden rounded-2xl border border-[#EBE4D8] bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                    <div class="h-48 bg-[#EBE4D8]/50 overflow-hidden relative">
                        @if($image)
                            <img src="{{ $image }}" alt="{{ $item->name }}{{ $isPlaceholder ? ' - ' . \App\Models\MenuItem::PLACEHOLDER_NOTICE : '' }}" title="{{ $isPlaceholder ? \App\Models\MenuItem::PLACEHOLDER_NOTICE : $item->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                        @endif
                        <span class="absolute top-3 right-3 rounded-full bg-[#475638]/90 backdrop-blur-sm px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-white">
                            {{ $item->category->name ?? 'Menu' }}
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#22261E] font-serif group-hover:text-[#475638] transition">{{ $item->name }}</h3>
                        <p class="mt-2 text-xs sm:text-sm text-[#575E50] line-clamp-2 leading-relaxed">{{ $item->description }}</p>
                        <div class="mt-4 pt-4 border-t border-[#F3ECE1] flex items-center justify-between">
                            <span class="text-xs text-[#889180]">Mulai dari</span>
                            @if($item->base_price !== null && $item->base_price > 0)
                                <span class="text-base font-bold text-[#475638]">Rp {{ number_format($item->base_price, 0, ',', '.') }}</span>
                            @else
                                <span class="text-xs font-bold text-[#C4823F]">Tanya Barista</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Outlets Section --}}
<div class="bg-[#FAF7F2] py-20 lg:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#475638]">Temukan Lokasi</span>
            <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-[#22261E] font-serif">Outlet Kami</h2>
            <p class="mt-3 text-sm sm:text-base text-[#575E50]">Singgah dan nikmati racikan kopi serta suasana slowbar terbaik.</p>
        </div>
        <div class="grid gap-8 md:grid-cols-2 max-w-5xl mx-auto">
            @foreach($outlets as $outlet)
                @php $photo = $outlet->getFirstMediaUrl('photo'); @endphp
                <a href="{{ route('outlet.show', $outlet->slug) }}" class="group overflow-hidden rounded-3xl border border-[#EBE4D8] bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-56 bg-[#EBE4D8]/50 overflow-hidden relative">
                        @if($photo)
                            <img src="{{ $photo }}" alt="{{ $outlet->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                        @endif
                        <span class="absolute top-4 left-4 rounded-full bg-[#C4823F] px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-white shadow-sm">
                            {{ $outlet->city }}
                        </span>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-[#22261E] font-serif group-hover:text-[#475638] transition">{{ $outlet->name }}</h3>
                        <p class="mt-2 text-sm text-[#575E50] leading-relaxed">{{ $outlet->description }}</p>
                        <div class="mt-6 flex items-center justify-between pt-4 border-t border-[#F3ECE1]">
                            <span class="text-xs text-[#889180] font-medium">{{ $outlet->opening_hours }}</span>
                            <span class="text-xs font-bold text-[#475638] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                Buka Detail Outlet &rarr;
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection

