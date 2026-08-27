@extends('layouts.app')
@section('title', $page->meta_title ?? 'Daftar Menu Utama - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Lihat menu racikan kopi terbaik kami.')
@section('content')
{{-- Hero Header --}}
<div class="relative overflow-hidden bg-[#161A14] text-white py-20 lg:py-28">
    <div class="absolute inset-0 bg-cover bg-center opacity-20 mix-blend-luminosity" style="background-image:url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?q=80&w=1200');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/80 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border border-[#475638]/60 bg-[#475638]/20 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#C4823F]">
            Katalog Racikan & Pastry
        </span>
        <h1 class="mt-4 text-4xl sm:text-5xl font-bold tracking-tight font-serif text-[#FAF7F2]">{{ $sections['page_title'] ?? 'Menu Piyoh Kopi' }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-[#B2BBAE] leading-relaxed">{{ $sections['page_subtitle'] ?? 'Pemesanan dine-in dilakukan melalui QR yang tersedia di meja outlet.' }}</p>
        <p class="mx-auto mt-2 max-w-2xl text-xs sm:text-sm text-[#889180]">Ketersediaan dan penyesuaian harga dapat berbeda di setiap cabang outlet.</p>
    </div>
</div>

{{-- Menu Catalog --}}
<div class="bg-[#FAF7F2] py-20 lg:py-28">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        @foreach($menuCategories as $category)
            @if($category->menuItems->count())
                <div class="mb-16">
                    <div class="mb-8 flex items-center gap-3 border-b border-[#EBE4D8] pb-4">
                        <span class="w-2.5 h-6 bg-[#475638] rounded-full"></span>
                        <h2 class="text-2xl sm:text-3xl font-bold text-[#22261E] font-serif">{{ $category->name }}</h2>
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-[#EBF0E6] text-[#475638]">
                            {{ $category->menuItems->count() }} item
                        </span>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        @foreach($category->menuItems as $item)
                            @php $image = $item->getFirstMediaUrl('image'); @endphp
                            <div class="group overflow-hidden rounded-2xl border border-[#EBE4D8] bg-white shadow-sm transition-all duration-200 hover:shadow-md hover:-translate-y-0.5">
                                <div class="grid grid-cols-1 sm:grid-cols-[160px_1fr]">
                                    <div class="min-h-40 bg-[#EBE4D8]/50 overflow-hidden relative">
                                        @if($image)
                                            <img src="{{ $image }}" alt="{{ $item->name }}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                                        @endif
                                    </div>
                                    <div class="p-5 flex flex-col justify-between">
                                        <div>
                                            <div class="flex items-start justify-between gap-3">
                                                <h3 class="font-bold text-[#22261E] font-serif text-lg group-hover:text-[#475638] transition">{{ $item->name }}</h3>
                                                <span class="whitespace-nowrap rounded-full bg-[#FAF7F2] border border-[#EBE4D8] px-3 py-1 text-xs font-bold text-[#475638]">
                                                    Rp {{ number_format($item->base_price, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            <p class="mt-2 text-xs sm:text-sm text-[#575E50] leading-relaxed">{{ $item->description }}</p>
                                        </div>
                                        <div class="mt-4 flex items-center justify-between text-[11px] text-[#889180]">
                                            <span>Tersedia di Meja QR</span>
                                            <span class="font-semibold text-[#C4823F]">Freshly Brewed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
