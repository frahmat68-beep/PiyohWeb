@extends('layouts.app')

@section('title', $outlet->name . ' - Piyoh Kopi')
@section('meta_description', $outlet->description)

@section('content')
<div class="bg-amber-950 text-white py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('https://images.unsplash.com/photo-1559925393-8be0ec4767c8?q=80&w=1200');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="bg-amber-800 text-amber-100 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $outlet->city }}</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-4">{{ $outlet->name }}</h1>
        <p class="mt-4 text-amber-200 max-w-2xl mx-auto text-sm sm:text-base">
            {{ $outlet->description }}
        </p>
    </div>
</div>

<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            
            <!-- Sidebar Info -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-amber-50/30 rounded-3xl border border-amber-100/50 p-8 sticky top-28">
                    <h3 class="text-xl font-bold text-stone-900 mb-6">Informasi Outlet</h3>
                    
                    <div class="space-y-6 text-sm text-stone-700">
                        <div>
                            <span class="block text-xs font-semibold uppercase tracking-wider text-stone-400 mb-1">Alamat</span>
                            <p class="font-medium text-stone-900">{{ $outlet->address }}</p>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold uppercase tracking-wider text-stone-400 mb-1">Jam Operasional</span>
                            <p class="font-medium text-stone-900">{{ $outlet->opening_hours }}</p>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold uppercase tracking-wider text-stone-400 mb-1">WhatsApp Order</span>
                            <a href="https://wa.me/{{ $outlet->whatsapp }}" target="_blank" class="font-semibold text-amber-800 hover:underline flex items-center gap-1.5 mt-1">
                                {{ $outlet->phone }} &rarr;
                            </a>
                        </div>
                        @if($outlet->google_maps_url)
                            <div class="pt-4">
                                <a href="{{ $outlet->google_maps_url }}" target="_blank" class="w-full text-center block bg-stone-900 hover:bg-stone-850 text-white font-semibold py-3.5 rounded-xl transition duration-300">
                                    Petunjuk Arah Maps
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Menu Outlet List -->
            <div class="lg:col-span-2 space-y-16">
                <div>
                    <h2 class="text-3xl font-extrabold text-stone-900 mb-2">Daftar Menu Outlet</h2>
                    <p class="text-stone-500 text-sm">Berikut adalah ketersediaan menu dan harga khusus untuk outlet {{ $outlet->name }}.</p>
                </div>

                @forelse($menuCategories as $category)
                    @if($category->menuItems->count() > 0)
                        <div>
                            <h3 class="text-2xl font-bold text-stone-950 mb-6 pb-2 border-b border-amber-100/60 flex items-center gap-2">
                                <span class="w-2 h-6 bg-amber-800 rounded-sm"></span>
                                {{ $category->name }}
                            </h3>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($category->menuItems as $item)
                                    @php
                                        // Calculate specific outlet price override or use base price
                                        $price = $item->getPriceForOutlet($outlet);
                                        $isAvailable = $item->isAvailableAtOutlet($outlet);
                                    @endphp
                                    <div class="p-5 bg-white border border-amber-50 rounded-2xl shadow-sm flex flex-col justify-between opacity-{{ $isAvailable ? '100' : '60' }}">
                                        <div>
                                            <div class="flex justify-between items-start gap-4 mb-2">
                                                <h4 class="font-bold text-stone-900 text-base leading-tight">{{ $item->name }}</h4>
                                                <span class="font-semibold text-amber-900 text-sm whitespace-nowrap bg-amber-50 px-2 py-1 rounded-md">
                                                    Rp {{ number_format($price, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            <p class="text-stone-500 text-xs leading-relaxed">{{ $item->description }}</p>
                                        </div>
                                        <div class="mt-4 flex items-center justify-between text-xs">
                                            @if($isAvailable)
                                                <span class="text-emerald-700 font-semibold bg-emerald-50 px-2 py-0.5 rounded">Tersedia</span>
                                            @else
                                                <span class="text-stone-500 font-semibold bg-stone-100 px-2 py-0.5 rounded">Habis</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @empty
                    <p class="text-stone-500 text-sm">Belum ada menu yang didaftarkan pada outlet ini.</p>
                @endforelse
            </div>
            
        </div>
    </div>
</div>
@endsection
