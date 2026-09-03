@extends('layouts.app')
@section('title', $page->meta_title ?? 'Piyoh Kopi - Coffee, Slowbar, Ambience')
@section('meta_description', $page->meta_description ?? 'Coffee shop hangat untuk kopi, slowbar, pastry, dan suasana nyaman nongkrong atau nugas.')
@section('content')
@php
    $bannerImage = $heroBanner?->getFirstMediaUrl('image');
@endphp

{{-- Hero Section --}}
<section class="relative overflow-hidden bg-[#161A14] text-white">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity scale-105 transition-transform duration-1000" style="background-image:url('{{ $bannerImage ?: 'https://images.unsplash.com/photo-1507133750040-4a8f57021571?q=80&w=1600' }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#161A14] via-[#161A14]/90 to-[#161A14]/50"></div>
    
    <div class="relative mx-auto grid max-w-7xl 2xl:max-w-[1600px] gap-12 px-4 py-24 sm:px-6 lg:grid-cols-12 lg:px-10 2xl:px-16 lg:py-36 items-center">
        <div class="lg:col-span-7 space-y-8">
            <h1 class="text-4xl sm:text-6xl lg:text-7xl 2xl:text-8xl font-bold leading-[1.05] tracking-tight font-serif text-[#FAF7F2]">
                {{ $sections['hero_title'] ?? 'Ruang Hangat untuk Kopi dan Santai' }}
            </h1>
            <p class="max-w-xl text-base sm:text-lg lg:text-xl leading-relaxed text-[#B2BBAE] font-light">
                {{ $sections['hero_subtitle'] ?? 'Nikmati racikan kopi istimewa nusantara, slowbar artisanal, dan suasana santai yang menenangkan di outlet Piyoh Kopi.' }}
            </p>
            <div class="pt-2 flex flex-wrap items-center gap-4">
                <a href="{{ route('menu') }}" class="touch-target-44 inline-flex items-center justify-center rounded-full bg-[#475638] hover:bg-[#36422A] px-9 py-4 text-base font-semibold text-white transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Lihat Menu
                </a>
                @if($primaryOutlet && $primaryOutlet->google_maps_url)
                    <a href="{{ $primaryOutlet->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="touch-target-44 inline-flex items-center justify-center rounded-full border border-white/25 bg-white/5 hover:bg-white/15 px-8 py-4 text-base font-semibold text-[#FAF7F2] transition-all duration-300 backdrop-blur-sm">
                        Petunjuk Lokasi
                    </a>
                @else
                    <a href="{{ route('outlet.show', 'galaxy') }}" class="touch-target-44 inline-flex items-center justify-center rounded-full border border-white/25 bg-white/5 hover:bg-white/15 px-8 py-4 text-base font-semibold text-[#FAF7F2] transition-all duration-300 backdrop-blur-sm">
                        Detail Outlet
                    </a>
                @endif
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="rounded-3xl border border-white/15 bg-[#222920]/80 p-7 sm:p-9 backdrop-blur-md shadow-2xl space-y-6">
                <div class="flex items-start justify-between border-b border-white/10 pb-6">
                    <div>
                        <p class="text-xs uppercase tracking-widest text-[#C4823F] font-semibold">Outlet Utama</p>
                        <h2 class="mt-1.5 text-2xl sm:text-3xl font-bold text-[#FAF7F2] font-serif">{{ $primaryOutlet->name ?? 'Galaxy Bekasi' }}</h2>
                        <p class="mt-1 text-xs sm:text-sm text-[#889180]">{{ $primaryOutlet ? Str::limit($primaryOutlet->address, 45) : 'Grand Galaxy City, RGA No. 7' }}</p>
                    </div>
                    @if($primaryOutlet && $primaryOutlet->isOpenNow())
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-emerald-950/70 border border-emerald-500/30 text-emerald-400 text-xs font-medium">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Buka
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-stone-900/80 border border-stone-600/40 text-[#D5DBD0] text-xs font-medium">
                            <span class="w-2 h-2 rounded-full bg-stone-400"></span>
                            Tutup
                        </span>
                    @endif
                </div>

                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <div>
                        <p class="text-xs uppercase tracking-widest text-[#889180] font-medium">Jam Operasional</p>
                        <p class="text-lg sm:text-xl font-bold text-[#FAF7F2] font-serif">{{ $primaryOutlet->opening_hours ?? '08:00 — 23:30 WIB' }}</p>
                    </div>
                    <p class="text-xs text-[#889180]">Setiap Hari</p>
                </div>

                <div class="pt-2 flex gap-3.5">
                    <a href="{{ route('menu') }}" class="touch-target-44 flex-1 text-center rounded-full bg-[#FAF7F2] hover:bg-white px-5 py-3.5 text-xs sm:text-sm font-bold text-[#22261E] transition shadow-sm hover:shadow">
                        Buku Menu
                    </a>
                    <a href="{{ route('outlet.index') }}" class="touch-target-44 flex-1 text-center rounded-full border border-white/20 bg-white/5 hover:bg-white/15 px-5 py-3.5 text-xs sm:text-sm font-semibold text-[#FAF7F2] transition">
                        Semua Outlet
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- About Teaser Section --}}
<section class="reveal-on-scroll bg-[#FAF7F2] py-20 lg:py-28 border-b border-[#EBE4D8]">
    <div class="mx-auto grid max-w-7xl 2xl:max-w-[1600px] gap-12 px-4 sm:px-6 lg:grid-cols-12 lg:px-10 2xl:px-16 items-center">
        <div class="lg:col-span-6 space-y-6">
            <h2 class="text-3xl sm:text-5xl font-bold text-[#22261E] font-serif leading-tight">
                Rasa, suasana, dan tempat yang pas untuk singgah.
            </h2>
            <p class="text-base sm:text-lg leading-relaxed text-[#575E50] font-light">
                {{ $sections['about_preview'] ?? 'Piyoh Kopi menghadirkan racikan kopi istimewa, suasana hangat yang menenangkan, dan tempat yang nyaman untuk berkumpul maupun menyelesaikan pekerjaan.' }}
            </p>
            <div class="pt-2">
                <a href="{{ route('about') }}" class="touch-target-44 inline-flex items-center gap-2 text-sm font-bold text-[#475638] hover:text-[#36422A] transition">
                    <span>Pelajari selengkapnya tentang kami</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
        <div class="lg:col-span-6 grid gap-5 sm:grid-cols-2">
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=600" class="h-64 sm:h-80 w-full rounded-3xl object-cover shadow-sm transition-transform duration-500 hover:scale-[1.02]" alt="Coffee preparation">
            <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=600" class="h-64 sm:h-80 w-full rounded-3xl object-cover shadow-sm transition-transform duration-500 hover:scale-[1.02] sm:mt-8" alt="Coffee shop ambience">
        </div>
    </div>
</section>

{{-- Featured Menu Section --}}
<section class="reveal-on-scroll bg-[#F3ECE1] py-20 lg:py-28 border-b border-[#EBE4D8]">
    <div class="mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 sm:px-6 lg:px-10 2xl:px-16">
        <div class="mb-12 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h2 class="text-3xl sm:text-4xl font-bold text-[#22261E] font-serif">Menu Pilihan</h2>
                <p class="mt-2 text-sm text-[#575E50]">Racikan kopi dan sajian signature favorit pengunjung Piyoh Kopi.</p>
            </div>
            <a href="{{ route('menu') }}" class="touch-target-44 inline-flex items-center gap-2 text-sm font-bold text-[#475638] hover:text-[#36422A] transition">
                <span>Lihat semua menu</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($featuredMenuItems as $item)
                @php 
                    $image = $item->getImageUrl(); 
                    $isPlaceholder = $item->isUsingPlaceholderImage();
                @endphp
                <div class="group overflow-hidden rounded-2xl border border-[#EBE4D8] bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between">
                    <div>
                        <div class="aspect-[4/3] bg-[#EBE4D8]/50 overflow-hidden relative">
                            @if($image)
                                <img src="{{ $image }}" alt="{{ $item->name }}{{ $isPlaceholder ? ' - ' . \App\Models\MenuItem::PLACEHOLDER_NOTICE : '' }}" title="{{ $isPlaceholder ? \App\Models\MenuItem::PLACEHOLDER_NOTICE : $item->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-[#22261E] font-serif group-hover:text-[#475638] transition">{{ $item->name }}</h3>
                            <p class="mt-2 text-xs sm:text-sm text-[#575E50] line-clamp-2 leading-relaxed">{{ $item->description }}</p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-2 border-t border-[#F3ECE1] flex items-center justify-between">
                        <span class="text-xs text-[#889180]">Harga</span>
                        @if($item->base_price !== null && $item->base_price > 0)
                            <span class="text-base font-bold text-[#475638]">Rp {{ number_format($item->base_price, 0, ',', '.') }}</span>
                        @else
                            <span class="text-xs font-bold text-[#C4823F]">Tanya Barista</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Outlets Section --}}
<section class="reveal-on-scroll bg-[#FAF7F2] py-20 lg:py-28">
    <div class="mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 sm:px-6 lg:px-10 2xl:px-16">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-3xl sm:text-4xl font-bold text-[#22261E] font-serif">Outlet Kami</h2>
            <p class="mt-3 text-sm sm:text-base text-[#575E50]">Singgah dan nikmati racikan kopi serta suasana slowbar terbaik.</p>
        </div>
        <div class="grid gap-8 md:grid-cols-2 max-w-5xl mx-auto">
            @foreach($outlets as $outlet)
                @php $photo = $outlet->getImageUrl(); @endphp
                <a href="{{ route('outlet.show', $outlet->slug) }}" class="group overflow-hidden rounded-3xl border border-[#EBE4D8] bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-60 bg-[#EBE4D8]/50 overflow-hidden relative">
                        @if($photo)
                            <img src="{{ $photo }}" alt="{{ $outlet->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                        @endif
                        <span class="absolute top-4 left-4 rounded-full bg-[#C4823F] px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-white shadow-sm">
                            {{ $outlet->city }}
                        </span>
                        @if($outlet->isOpenNow())
                            <span class="absolute top-4 right-4 rounded-full px-3 py-1 text-xs font-bold shadow-sm bg-emerald-700 text-white flex items-center gap-1.5 backdrop-blur-xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                                Buka
                            </span>
                        @else
                            <span class="absolute top-4 right-4 rounded-full px-3 py-1 text-xs font-bold shadow-sm bg-[#575E50] text-[#FAF7F2] flex items-center gap-1.5 backdrop-blur-xs">
                                <span class="w-1.5 h-1.5 rounded-full bg-stone-300"></span>
                                Tutup
                            </span>
                        @endif
                    </div>
                    <div class="p-8">
                        <div class="flex items-baseline justify-between">
                            <h3 class="text-2xl font-bold text-[#22261E] font-serif group-hover:text-[#475638] transition">{{ $outlet->name }}</h3>
                            <span class="text-xs font-semibold text-[#C4823F] uppercase tracking-wider">{{ $outlet->city }}</span>
                        </div>
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
</section>
@endsection

