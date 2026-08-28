@extends('layouts.app')

@section('title', $page->meta_title ?? 'Tentang Kami - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Mengenal filosofi, sejarah, dan dedikasi seduh Piyoh Kopi.')

@section('content')
{{-- Hero Header --}}
<div class="relative overflow-hidden bg-[#161A14] text-white py-24 lg:py-32">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity scale-105" style="background-image: url('https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=1400');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/85 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 sm:px-6 lg:px-10 2xl:px-16 text-center">
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight font-serif text-[#FAF7F2]">Tentang Piyoh Kopi</h1>
        <p class="mt-5 text-[#B2BBAE] max-w-2xl mx-auto text-base sm:text-xl font-light leading-relaxed">
            Menyajikan racikan kopi nusantara terbaik dengan dedikasi tinggi, menghadirkan ruang hangat untuk setiap momen kebersamaan.
        </p>
    </div>
</div>

{{-- Story & Values --}}
<div class="py-20 lg:py-28 bg-[#FAF7F2]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- History -->
        <div class="mb-16 rounded-3xl border border-[#EBE4D8] bg-white p-8 sm:p-12 shadow-sm">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#475638]">Perjalanan Kami</span>
            <h2 class="mt-2 text-2xl sm:text-3xl font-bold text-[#22261E] font-serif mb-6">Sejarah & Semangat Awal</h2>
            <div class="text-[#575E50] leading-relaxed space-y-4 text-base">
                <p>{{ $sections['history'] ?? 'Piyoh Kopi bermula dari sebuah kedai kecil berbekal mimpi menyajikan kopi nusantara terbaik dengan harga yang bersahabat dan suasana slowbar yang nyaman.' }}</p>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="rounded-3xl border border-[#EBE4D8] bg-white p-8 shadow-sm">
                <h3 class="text-xl font-bold text-[#22261E] font-serif mb-4 flex items-center gap-2.5">
                    <span class="w-2.5 h-6 bg-[#475638] rounded-full"></span>
                    Visi Kami
                </h3>
                <p class="text-[#575E50] leading-relaxed text-sm sm:text-base">
                    {{ $sections['vision'] ?? 'Menjadi jaringan gerai kopi pilihan utama masyarakat Indonesia yang mengedepankan kualitas, kemudahan, dan inovasi rasa.' }}
                </p>
            </div>
            <div class="rounded-3xl border border-[#EBE4D8] bg-white p-8 shadow-sm">
                <h3 class="text-xl font-bold text-[#22261E] font-serif mb-4 flex items-center gap-2.5">
                    <span class="w-2.5 h-6 bg-[#C4823F] rounded-full"></span>
                    Misi Kami
                </h3>
                <div class="text-[#575E50] leading-relaxed text-sm sm:text-base whitespace-pre-line">{{ $sections['mission'] ?? "1. Menyajikan produk kopi berkualitas tinggi.\n2. Memberikan pelayanan ramah dan tulus.\n3. Membangun ruang komunitas yang hangat dan nyaman." }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
