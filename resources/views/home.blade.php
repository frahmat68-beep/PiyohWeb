@extends('layouts.app')

@section('title', $page->meta_title ?? 'Piyoh Kopi - Cita Rasa Kopi Nusantara Terkini')
@section('meta_description', $page->meta_description ?? 'Selamat datang di Piyoh Kopi.')

@section('content')
<div class="relative bg-amber-950 text-white overflow-hidden py-32">
    <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://images.unsplash.com/photo-1507133750040-4a8f57021571?q=80&w=1200');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-amber-950 via-amber-900/90 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
        <span class="inline-block bg-amber-800 text-amber-100 text-xs font-semibold tracking-wider uppercase px-3 py-1.5 rounded-full mb-6 border border-amber-600/30">
            Welcome to Piyoh Kopi
        </span>
        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight max-w-3xl leading-tight mb-6">
            {{ $sections['hero_title'] ?? 'Setiap Tegukan Punya Cerita' }}
        </h1>
        <p class="text-lg sm:text-xl text-amber-100/90 max-w-2xl leading-relaxed mb-10">
            {{ $sections['hero_subtitle'] ?? 'Piyoh Kopi menyajikan kopi pilihan berkualitas tinggi langsung ke meja Anda.' }}
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('menu') }}" class="bg-amber-600 hover:bg-amber-500 text-white px-8 py-4 rounded-full font-bold shadow-lg shadow-amber-600/20 transition duration-300">
                Lihat Menu Kami
            </a>
            <a href="{{ route('outlet.index') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-8 py-4 rounded-full font-bold backdrop-blur-sm transition duration-300">
                Cari Outlet Terdekat
            </a>
        </div>
    </div>
</div>

<!-- Brief Intro Section -->
<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-amber-800 font-bold text-sm tracking-wider uppercase block mb-3">Tentang Kami</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-stone-900 tracking-tight leading-tight mb-6">
                    Mengenal Lebih Dekat Racikan Khas Piyoh Kopi
                </h2>
                <p class="text-stone-600 leading-relaxed mb-8">
                    {{ $sections['about_preview'] ?? 'Berdiri sejak tahun 2020, Piyoh Kopi berkomitmen memperkenalkan kopi racikan modern dengan sentuhan tradisional lokal.' }}
                </p>
                <a href="{{ route('about') }}" class="text-amber-800 font-bold hover:text-amber-900 inline-flex items-center gap-2 group">
                    <span>Baca Selengkapnya</span>
                    <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=600" alt="Coffee preparation" class="rounded-2xl shadow-md transform translate-y-6">
                <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=600" alt="Coffee shop atmosphere" class="rounded-2xl shadow-md">
            </div>
        </div>
    </div>
</div>

<!-- Outlets Highlight -->
<div class="py-24 bg-amber-50/20 border-y border-amber-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-800 font-bold text-sm tracking-wider uppercase block mb-3">Cabang Outlet</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-stone-900 tracking-tight">Kunjungi Gerai Kami</h2>
            <p class="text-stone-600 mt-4">
                Temukan suasana ternyaman untuk bersantai, nugas, atau berdiskusi di cabang-cabang Piyoh Kopi terdekat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($outlets as $outlet)
                <div class="bg-white rounded-2xl shadow-sm border border-amber-100 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-8">
                        <span class="inline-block bg-amber-50 text-amber-800 text-xs font-semibold px-2.5 py-1 rounded-md mb-4">{{ $outlet->city }}</span>
                        <h3 class="text-xl font-bold text-stone-900 mb-2">{{ $outlet->name }}</h3>
                        <p class="text-stone-600 text-sm mb-6 line-clamp-2">{{ $outlet->description }}</p>
                        
                        <div class="text-xs text-stone-500 space-y-2 mb-6">
                            <p><strong>Alamat:</strong> {{ $outlet->address }}</p>
                            <p><strong>Jam Buka:</strong> {{ $outlet->opening_hours }}</p>
                        </div>
                        
                        <a href="{{ route('outlet.show', $outlet->slug) }}" class="block text-center bg-stone-900 hover:bg-stone-800 text-white py-3 rounded-xl font-semibold text-sm transition-colors">
                            Lihat Detail & Menu
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
