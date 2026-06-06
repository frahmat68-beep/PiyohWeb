@extends('layouts.app')
@section('title', $page->meta_title ?? 'Piyoh Kopi - Coffee, Slowbar, Pastry')
@section('meta_description', $page->meta_description ?? 'Coffee shop hangat untuk kopi, slowbar, pastry, dan suasana nyaman nongkrong atau nugas.')
@section('content')
@php
    $bannerImage = $heroBanner?->getFirstMediaUrl('image');
@endphp
<div class="relative overflow-hidden bg-[#1c120b] text-white">
    <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image:url('{{ $bannerImage ?: 'https://images.unsplash.com/photo-1507133750040-4a8f57021571?q=80&w=1400' }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#1c120b] via-[#1c120b]/80 to-transparent"></div>
    <div class="relative mx-auto grid max-w-7xl gap-12 px-4 py-24 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-32">
        <div>
            <span class="inline-flex rounded-full border border-white/10 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em]">Coffee • Slowbar • Pastry</span>
            <h1 class="mt-6 max-w-2xl text-5xl font-extrabold leading-tight tracking-tight sm:text-6xl" style="font-family:'Outfit',sans-serif;">{{ $sections['hero_title'] ?? 'Ruang Hangat untuk Kopi dan Santai' }}</h1>
            <p class="mt-6 max-w-xl text-base leading-7 text-amber-100/90 sm:text-lg">{{ $sections['hero_subtitle'] ?? 'Nikmati kopi, pastry, dan suasana nyaman di outlet Piyoh Kopi.' }}</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('menu') }}" class="rounded-full bg-amber-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-amber-600">Lihat Menu</a>
                @if($primaryOutlet && $primaryOutlet->google_maps_url)
                    <a href="{{ $primaryOutlet->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="rounded-full border border-white/15 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/15">Buka Maps</a>
                @else
                    <a href="{{ route('outlet.show', 'galaxy') }}" class="rounded-full border border-white/15 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/15">Detail Outlet</a>
                @endif
            </div>
            <p class="mt-4 text-sm text-amber-100/80">Untuk dine-in, pemesanan dilakukan melalui QR yang tersedia di meja outlet.</p>
        </div>
        <div class="grid gap-4 self-end rounded-3xl border border-white/10 bg-white/5 p-4 backdrop-blur-sm sm:grid-cols-2">
            <div class="rounded-2xl bg-white/10 p-5"><p class="text-xs uppercase tracking-[0.2em] text-amber-100/70">Lokasi utama</p><p class="mt-2 text-lg font-semibold">Galaxy Bekasi</p></div>
            <div class="rounded-2xl bg-white/10 p-5"><p class="text-xs uppercase tracking-[0.2em] text-amber-100/70">Jam buka</p><p class="mt-2 text-lg font-semibold">08:00 - 23:30</p></div>
            <div class="rounded-2xl bg-white/10 p-5 sm:col-span-2"><p class="text-xs uppercase tracking-[0.2em] text-amber-100/70">Aksi cepat</p><div class="mt-3 flex flex-wrap gap-3"><a href="{{ route('menu') }}" class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-stone-900">Lihat Menu</a><a href="{{ route('outlet.index') }}" class="rounded-full border border-white/20 px-4 py-2 text-sm font-semibold text-white">Lihat Outlet</a></div></div>
        </div>
    </div>
</div>
<div class="bg-white py-20"><div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8"><div><h2 class="text-3xl font-extrabold text-stone-900" style="font-family:'Outfit',sans-serif;">Rasa, suasana, dan tempat yang pas untuk singgah.</h2><p class="mt-4 text-stone-600">{{ $sections['about_preview'] ?? 'Piyoh Kopi menghadirkan kopi yang hangat, suasana yang nyaman, dan menu yang mudah dijelajahi.' }}</p></div><div class="grid gap-4 sm:grid-cols-2"><img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=600" class="rounded-3xl object-cover shadow-sm" alt="Coffee preparation"><img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=600" class="rounded-3xl object-cover shadow-sm" alt="Coffee shop ambience"></div></div></div>
<div class="bg-[#f7f2ea] py-20"><div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="mb-10 flex items-end justify-between gap-4"><div><p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-800">Featured Menu</p><h2 class="mt-2 text-3xl font-extrabold text-stone-900" style="font-family:'Outfit',sans-serif;">Menu favorit yang langsung terlihat jelas.</h2></div><a href="{{ route('menu') }}" class="text-sm font-semibold text-amber-800 hover:text-amber-900">Lihat semua</a></div><div class="grid gap-6 md:grid-cols-3">@foreach($featuredMenuItems as $item)@php $image = $item->getFirstMediaUrl('image'); @endphp<div class="overflow-hidden rounded-3xl border border-amber-100 bg-white shadow-sm"><div class="h-44 bg-gradient-to-br from-amber-100 to-stone-200">@if($image)<img src="{{ $image }}" alt="{{ $item->name }}" class="h-full w-full object-cover">@endif</div><div class="p-6"><p class="text-xs uppercase tracking-[0.2em] text-amber-700">{{ $item->category->name ?? 'Menu' }}</p><h3 class="mt-3 text-xl font-bold text-stone-900">{{ $item->name }}</h3><p class="mt-2 text-sm text-stone-600">{{ $item->description }}</p><p class="mt-4 font-semibold text-stone-900">Rp {{ number_format($item->base_price, 0, ',', '.') }}</p></div></div>@endforeach</div></div></div>
<div class="bg-white py-20"><div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><h2 class="text-3xl font-extrabold text-stone-900" style="font-family:'Outfit',sans-serif;">Outlet kami</h2><div class="mt-8 grid gap-6 md:grid-cols-2">@foreach($outlets as $outlet)@php $photo = $outlet->getFirstMediaUrl('photo'); @endphp<a href="{{ route('outlet.show', $outlet->slug) }}" class="overflow-hidden rounded-3xl border border-amber-100 bg-amber-50/20 transition hover:shadow-md"><div class="h-48 bg-gradient-to-br from-amber-100 to-stone-200">@if($photo)<img src="{{ $photo }}" alt="{{ $outlet->name }}" class="h-full w-full object-cover">@endif</div><div class="p-6"><p class="text-xs uppercase tracking-[0.2em] text-amber-700">{{ $outlet->city }}</p><h3 class="mt-2 text-xl font-bold text-stone-900">{{ $outlet->name }}</h3><p class="mt-2 text-sm text-stone-600">{{ $outlet->description }}</p><p class="mt-4 text-sm font-medium text-amber-800">Buka detail outlet</p></div></a>@endforeach</div></div></div>
@endsection
