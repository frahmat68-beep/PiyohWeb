@extends('layouts.app')

@section('title', $page->meta_title ?? 'Tentang Kami - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Mengenal sejarah dan komitmen Piyoh Kopi.')

@section('content')
<div class="bg-amber-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=1200');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">Tentang Piyoh Kopi</h1>
        <p class="mt-4 text-amber-200 max-w-2xl mx-auto text-base sm:text-lg">
            Menyajikan kualitas rasa kopi nusantara terbaik dengan dedikasi tinggi.
        </p>
    </div>
</div>

<div class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- History -->
        <div class="mb-16">
            <h2 class="text-3xl font-extrabold text-stone-900 mb-6">Sejarah Kami</h2>
            <div class="prose prose-amber text-stone-600 max-w-none leading-relaxed">
                <p>{{ $sections['history'] ?? 'Piyoh Kopi bermula dari sebuah kedai kecil berbekal mimpi menyajikan kopi nusantara terbaik dengan harga yang bersahabat.' }}</p>
            </div>
        </div>

        <hr class="border-amber-100 my-16">

        <!-- Vision & Mission -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold text-stone-950 mb-4 flex items-center gap-2">
                    <span class="w-2.5 h-6 bg-amber-800 rounded-sm"></span>
                    Visi Kami
                </h3>
                <p class="text-stone-600 leading-relaxed">
                    {{ $sections['vision'] ?? 'Menjadi jaringan gerai kopi pilihan utama masyarakat Indonesia yang mengedepankan kualitas, kemudahan, dan inovasi rasa.' }}
                </p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-stone-950 mb-4 flex items-center gap-2">
                    <span class="w-2.5 h-6 bg-amber-800 rounded-sm"></span>
                    Misi Kami
                </h3>
                <div class="text-stone-600 leading-relaxed whitespace-pre-line">{{ $sections['mission'] ?? "1. Menyajikan produk kopi berkualitas.\n2. Memberikan pelayanan ramah.\n3. Membangun ruang komunitas yang nyaman." }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
