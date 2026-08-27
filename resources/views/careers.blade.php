@extends('layouts.app')
@section('title', $page->meta_title ?? 'Karir & Peluang - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Bergabunglah bersama tim barista dan slowbar Piyoh Kopi.')
@section('content')
{{-- Hero Header --}}
<div class="relative overflow-hidden bg-[#161A14] text-white py-20 lg:py-28">
    <div class="absolute inset-0 bg-cover bg-center opacity-20 mix-blend-luminosity" style="background-image:url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1200');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/80 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border border-[#475638]/60 bg-[#475638]/20 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#C4823F]">
            Kesempatan Berkarir
        </span>
        <h1 class="mt-4 text-4xl sm:text-5xl font-bold tracking-tight font-serif text-[#FAF7F2]">{{ $sections['page_title'] ?? 'Tumbuh Bersama Piyoh Kopi' }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-[#B2BBAE] leading-relaxed">{{ $sections['page_subtitle'] ?? 'Kami selalu mencari talenta berbakat yang memiliki kecintaan mendalam pada kopi dan keramahan pelayanan.' }}</p>
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
