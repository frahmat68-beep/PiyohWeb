@extends('layouts.app')

@section('title', $page->meta_title ?? 'Daftar Menu Utama - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Lihat menu racikan kopi terbaik kami.')

@section('content')
<div class="bg-amber-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?q=80&w=1200');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ $sections['page_title'] ?? 'Eksplorasi Rasa Unik Kami' }}</h1>
        <p class="mt-4 text-amber-200 max-w-2xl mx-auto text-base sm:text-lg">
            {{ $sections['page_subtitle'] ?? 'Dari Signature Coffee hingga hidangan lezat peneman bersantai Anda.' }}
        </p>
    </div>
</div>

<div class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        @forelse($menuCategories as $category)
            @if($category->menuItems->count() > 0)
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 mb-8 pb-3 border-b border-amber-100 flex items-center gap-2">
                        <span class="w-3 h-8 bg-amber-800 rounded-sm"></span>
                        {{ $category->name }}
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($category->menuItems as $item)
                            <div class="p-6 bg-amber-50/10 border border-amber-100/40 rounded-2xl flex justify-between gap-6">
                                <div class="flex-grow">
                                    <div class="flex justify-between items-start gap-4 mb-2">
                                        <h3 class="font-bold text-stone-900 text-lg leading-tight">{{ $item->name }}</h3>
                                        <span class="font-semibold text-amber-950 text-sm whitespace-nowrap bg-amber-50 border border-amber-100 px-3 py-1 rounded-full">
                                            Rp {{ number_format($item->base_price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <p class="text-stone-500 text-sm leading-relaxed">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @empty
            <div class="text-center py-12">
                <p class="text-stone-500 text-sm">Belum ada menu yang didaftarkan secara global.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
