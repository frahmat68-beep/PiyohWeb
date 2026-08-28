@extends('layouts.app')
@section('title', $page->meta_title ?? 'Daftar Menu Utama — Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Lihat 62 racikan kopi, artisan tea, slowbar, dan sajian signature terbaik di Piyoh Kopi.')
@section('content')

{{-- Hero Header --}}
<section class="relative overflow-hidden bg-[#161A14] text-white py-20 lg:py-28">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity scale-105" style="background-image:url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?q=80&w=1400');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/85 to-transparent"></div>
    
    <div class="relative mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 text-center sm:px-6 lg:px-10 2xl:px-16">
        <h1 class="text-4xl sm:text-6xl font-bold tracking-tight font-serif text-[#FAF7F2]">
            {{ $sections['page_title'] ?? 'Buku Menu' }}
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-[#B2BBAE] font-light leading-relaxed">
            {{ $sections['page_subtitle'] ?? '62 racikan kopi nusantara, manual brew, artisan tea, dan sajian signature.' }}
        </p>
        <p class="mx-auto mt-3 max-w-xl text-xs sm:text-sm text-[#889180]">
            Untuk pemesanan langsung saat dine-in, silakan scan QR code di meja outlet Anda.
        </p>
    </div>
</section>

{{-- Sticky Quick Category Navigation Bar --}}
<div class="sticky top-[73px] z-40 bg-[#FAF7F2]/95 backdrop-blur-md border-b border-[#EBE4D8] py-2.5 px-4 overflow-x-auto scrollbar-none shadow-2xs">
    <div class="mx-auto max-w-7xl 2xl:max-w-[1600px] flex items-center gap-2 sm:gap-3 overflow-x-auto scrollbar-none px-1">
        @foreach($menuCategories as $cat)
            @if($cat->menuItems->count())
                <a href="#cat-{{ $cat->slug }}" class="shrink-0 whitespace-nowrap inline-flex items-center px-4 py-2 rounded-full text-xs font-semibold bg-white border border-[#EBE4D8] text-[#575E50] hover:bg-[#475638] hover:text-white hover:border-[#475638] transition-all shadow-2xs min-h-[44px]">
                    {{ $cat->name }}
                </a>
            @endif
        @endforeach
    </div>
</div>

{{-- Menu Catalog --}}
<section class="bg-[#FAF7F2] py-16 lg:py-24">
    <div class="mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 sm:px-6 lg:px-10 2xl:px-16 space-y-20">
        @foreach($menuCategories as $category)
            @if($category->menuItems->count())
                <div id="cat-{{ $category->slug }}" class="reveal-on-scroll scroll-mt-36">
                    <div class="mb-8 flex items-baseline justify-between border-b border-[#EBE4D8] pb-4">
                        <div class="flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-[#475638] rounded-full"></span>
                            <h2 class="text-2xl sm:text-3xl font-bold text-[#22261E] font-serif">{{ $category->name }}</h2>
                        </div>
                        <span class="text-xs font-medium text-[#889180]">
                            {{ $category->menuItems->count() }} Pilihan
                        </span>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach($category->menuItems as $item)
                            @php 
                                $image = $item->getImageUrl(); 
                                $isPlaceholder = $item->isUsingPlaceholderImage();
                            @endphp
                            <div class="group overflow-hidden rounded-2xl border border-[#EBE4D8] bg-white shadow-2xs transition-all duration-300 hover:shadow-md hover:-translate-y-1 flex flex-col justify-between">
                                <div>
                                    <div class="aspect-[4/3] bg-[#EBE4D8]/50 overflow-hidden relative">
                                        @if($image)
                                            <img src="{{ $image }}" alt="{{ $item->name }}{{ $isPlaceholder ? ' - ' . \App\Models\MenuItem::PLACEHOLDER_NOTICE : '' }}" title="{{ $isPlaceholder ? \App\Models\MenuItem::PLACEHOLDER_NOTICE : $item->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                                        @endif
                                    </div>
                                    <div class="p-5">
                                        <div class="flex items-start justify-between gap-3">
                                            <h3 class="font-bold text-[#22261E] font-serif text-lg group-hover:text-[#475638] transition leading-snug">{{ $item->name }}</h3>
                                        </div>
                                        <p class="mt-2 text-xs sm:text-sm text-[#575E50] leading-relaxed line-clamp-2">{{ $item->description }}</p>
                                    </div>
                                </div>
                                <div class="px-5 pb-5 pt-3 border-t border-[#F3ECE1] flex items-center justify-between">
                                    <span class="text-xs text-[#889180]">Harga</span>
                                    <span class="text-sm sm:text-base font-bold text-[#475638]">
                                        @if($item->base_price !== null && $item->base_price > 0)
                                            Rp {{ number_format($item->base_price, 0, ',', '.') }}
                                        @else
                                            <span class="text-xs text-[#C4823F]">Tanya Barista</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
@endsection
