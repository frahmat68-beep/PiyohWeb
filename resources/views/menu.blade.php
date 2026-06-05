@extends('layouts.app')
@section('title', $page->meta_title ?? 'Daftar Menu Utama - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Lihat menu racikan kopi terbaik kami.')
@section('content')
<div class="bg-[#1c120b] text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image:url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?q=80&w=1200');"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl" style="font-family:'Outfit',sans-serif;">{{ $sections['page_title'] ?? 'Menu Piyoh Kopi' }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base text-amber-100/90 sm:text-lg">{{ $sections['page_subtitle'] ?? 'Website ini hanya menampilkan menu. Pemesanan dine-in dilakukan melalui QR yang tersedia di meja outlet.' }}</p>
        <p class="mx-auto mt-3 max-w-2xl text-sm text-amber-100/70">Ketersediaan dan harga dapat berbeda di setiap outlet.</p>
    </div>
</div>
<div class="bg-white py-20">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        @foreach($menuCategories as $category)
            @if($category->menuItems->count())
                <div class="mb-12">
                    <h2 class="mb-6 text-2xl font-extrabold text-stone-900" style="font-family:'Outfit',sans-serif;">{{ $category->name }}</h2>
                    <div class="grid gap-4 md:grid-cols-2">
                        @foreach($category->menuItems as $item)
                            @php $image = $item->getFirstMediaUrl('image'); @endphp
                            <div class="overflow-hidden rounded-2xl border border-amber-100 bg-amber-50/20">
                                <div class="grid grid-cols-1 sm:grid-cols-[160px_1fr]">
                                    <div class="min-h-40 bg-gradient-to-br from-amber-100 to-stone-200">@if($image)<img src="{{ $image }}" alt="{{ $item->name }}" class="h-full w-full object-cover">@endif</div>
                                    <div class="p-5">
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <h3 class="font-bold text-stone-900">{{ $item->name }}</h3>
                                                <p class="mt-2 text-sm text-stone-600">{{ $item->description }}</p>
                                            </div>
                                            <span class="whitespace-nowrap rounded-full border border-amber-100 bg-white px-3 py-1 text-sm font-semibold text-stone-900">Rp {{ number_format($item->base_price, 0, ',', '.') }}</span>
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
