@extends('layouts.app')
@section('title', $outlet->name . ' - Piyoh Kopi')
@section('meta_description', $outlet->description)
@section('content')
@php $photo = $outlet->getFirstMediaUrl('photo'); @endphp
{{-- Hero Header --}}
<div class="relative overflow-hidden bg-[#161A14] text-white py-20 lg:py-28">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity" style="background-image:url('{{ $photo ?: 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1200' }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/80 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <span class="mb-4 inline-flex items-center gap-2 rounded-full border border-[#475638]/60 bg-[#475638]/20 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#C4823F]">{{ $outlet->city }}</span>
        <h1 class="text-4xl sm:text-5xl font-bold tracking-tight font-serif text-[#FAF7F2]">{{ $outlet->name }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-[#B2BBAE] leading-relaxed">{{ $outlet->description }}</p>
    </div>
</div>

{{-- Outlet Info & Quick Actions --}}
<div class="bg-[#FAF7F2] py-16 border-b border-[#EBE4D8]">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 md:grid-cols-2">
            <div class="rounded-3xl border border-[#EBE4D8] bg-white p-8 shadow-sm">
                <div class="flex items-center gap-2.5 mb-6">
                    <span class="w-2.5 h-6 bg-[#475638] rounded-full"></span>
                    <h2 class="text-xl font-bold text-[#22261E] font-serif">Informasi Outlet</h2>
                </div>
                <div class="space-y-4 text-sm text-[#575E50]">
                    <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[80px]">Alamat:</span> <span>{{ $outlet->address }}</span></p>
                    <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[80px]">Jam Buka:</span> <span>{{ $outlet->opening_hours }}</span></p>
                    @if($outlet->phone)
                        <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[80px]">Telepon:</span> <span>{{ $outlet->phone }}</span></p>
                    @endif
                    @if($outlet->whatsapp)
                        <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[80px]">WhatsApp:</span> <a class="text-[#475638] font-semibold hover:underline" href="https://wa.me/{{ $outlet->whatsapp }}" target="_blank" rel="noopener noreferrer">Hubungi WhatsApp Cabang</a></p>
                    @endif
                </div>
            </div>
            <div class="rounded-3xl border border-[#EBE4D8] bg-white p-8 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2.5 mb-4">
                        <span class="w-2.5 h-6 bg-[#C4823F] rounded-full"></span>
                        <h2 class="text-xl font-bold text-[#22261E] font-serif">Petunjuk & Sosial</h2>
                    </div>
                    <p class="text-sm text-[#575E50] mb-6">Gunakan peta digital untuk navigasi langsung ke lokasi cabang atau ikuti info terbaru kami.</p>
                </div>
                <div class="space-y-3">
                    @if($outlet->google_maps_url)
                        <a href="{{ $outlet->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="block rounded-full bg-[#475638] hover:bg-[#36422A] px-6 py-3.5 text-center font-bold text-sm text-white transition shadow-sm">
                            Buka Petunjuk Arah Google Maps
                        </a>
                    @endif
                    @if($outlet->instagram_url)
                        <a href="{{ $outlet->instagram_url }}" target="_blank" rel="noopener noreferrer" class="block rounded-full border border-[#EBE4D8] bg-[#FAF7F2] hover:bg-[#F3ECE1] px-6 py-3.5 text-center font-bold text-sm text-[#22261E] transition">
                            Instagram Outlet
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Menu Items in Outlet --}}
<div class="bg-[#F3ECE1] py-20 lg:py-28">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#C4823F]">Katalog Khusus</span>
            <h2 class="mt-2 text-3xl font-bold text-[#22261E] font-serif">Menu di {{ $outlet->name }}</h2>
        </div>
        <div class="space-y-12">
            @forelse($menuCategories as $category)
                @if($category->menuItems->count())
                    <div>
                        <h3 class="mb-6 text-2xl font-bold text-[#22261E] font-serif flex items-center gap-2">
                            <span class="w-2 h-5 bg-[#475638] rounded-full"></span>
                            {{ $category->name }}
                        </h3>
                        <div class="grid gap-6 md:grid-cols-2">
                            @foreach($category->menuItems as $item)
                                @php $image = $item->getFirstMediaUrl('image'); @endphp
                                <div class="group overflow-hidden rounded-2xl border border-[#EBE4D8] bg-white shadow-sm transition-all duration-200 hover:shadow-md">
                                    <div class="grid grid-cols-1 sm:grid-cols-[140px_1fr]">
                                        <div class="min-h-36 bg-[#EBE4D8]/50 overflow-hidden relative">
                                            @if($image)
                                                <img src="{{ $image }}" alt="{{ $item->name }}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105">
                                            @else
                                                <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-xs">Piyoh Kopi</div>
                                            @endif
                                        </div>
                                        <div class="p-5 flex flex-col justify-between">
                                            <div>
                                                <div class="flex items-start justify-between gap-3">
                                                    <h4 class="font-bold text-[#22261E] font-serif group-hover:text-[#475638] transition">{{ $item->name }}</h4>
                                                    <span class="whitespace-nowrap rounded-full bg-[#FAF7F2] border border-[#EBE4D8] px-3 py-1 text-xs font-bold text-[#475638]">
                                                        Rp {{ number_format($item->getPriceForOutlet($outlet), 0, ',', '.') }}
                                                    </span>
                                                </div>
                                                <p class="mt-2 text-xs sm:text-sm text-[#575E50] leading-relaxed">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @empty
                <div class="rounded-3xl border border-[#EBE4D8] bg-white p-8 text-center text-[#889180]">
                    <p>Belum ada menu outlet yang aktif saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
