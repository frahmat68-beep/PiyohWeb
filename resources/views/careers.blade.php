@extends('layouts.app')
@section('title', $page->meta_title ?? 'Karir & Peluang - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Bergabunglah bersama tim barista dan slowbar Piyoh Kopi.')
@section('content')
{{-- Hero Header --}}
<div class="relative overflow-hidden bg-[#161A14] text-white py-24 lg:py-32">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity scale-105" style="background-image:url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1400');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/85 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 text-center sm:px-6 lg:px-10 2xl:px-16">
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight font-serif text-[#FAF7F2]">{{ $sections['page_title'] ?? 'Tumbuh Bersama Piyoh Kopi' }}</h1>
        <p class="mx-auto mt-5 max-w-2xl text-base sm:text-xl text-[#B2BBAE] font-light leading-relaxed">{{ $sections['page_subtitle'] ?? 'Kami selalu mencari talenta berbakat yang memiliki kecintaan mendalam pada kopi dan keramahan pelayanan.' }}</p>
    </div>
</div>

<div class="bg-[#FAF7F2] py-20 lg:py-28">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-[#EBE4D8] bg-white p-12 text-center shadow-sm">
            <div class="w-14 h-14 bg-[#EBF0E6] text-[#475638] rounded-2xl flex items-center justify-center mx-auto mb-4 font-serif text-2xl font-bold">
                P
            </div>
            <h2 class="text-2xl font-bold text-[#22261E] font-serif">Belum Ada Posisi Terbuka</h2>
            <p class="mt-2 text-sm sm:text-base text-[#575E50] max-w-md mx-auto leading-relaxed">Saat ini seluruh posisi tim kami telah terisi. Pantau terus halaman ini atau ikuti Instagram resmi kami untuk update lowongan mendatang.</p>
        </div>
    </div>
</div>
@endsection
