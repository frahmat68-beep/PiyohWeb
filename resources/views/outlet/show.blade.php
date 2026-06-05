@extends('layouts.app')
@section('title', $outlet->name . ' - Piyoh Kopi')
@section('meta_description', $outlet->description)
@section('content')
@php $photo = $outlet->getFirstMediaUrl('photo'); @endphp
<div class="bg-[#1c120b] text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image:url('{{ $photo ?: 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1200' }}');"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <span class="mb-4 inline-flex rounded-full border border-white/15 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em]">{{ $outlet->city }}</span>
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl" style="font-family:'Outfit',sans-serif;">{{ $outlet->name }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base text-amber-100/90 sm:text-lg">{{ $outlet->description }}</p>
    </div>
</div>
<div class="bg-white py-16">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 md:grid-cols-2">
            <div class="rounded-3xl border border-amber-100 bg-amber-50/20 p-8">
                <h2 class="mb-6 text-xl font-bold text-stone-900">Info Outlet</h2>
                <div class="space-y-4 text-sm text-stone-700">
                    <p><span class="font-semibold text-stone-900">Alamat:</span> {{ $outlet->address }}</p>
                    <p><span class="font-semibold text-stone-900">Jam Buka:</span> {{ $outlet->opening_hours }}</p>
                    @if($outlet->phone)
                        <p><span class="font-semibold text-stone-900">Telepon:</span> {{ $outlet->phone }}</p>
                    @endif
                    @if($outlet->whatsapp)
                        <p><span class="font-semibold text-stone-900">WhatsApp Outlet:</span> <a class="text-amber-800 hover:underline" href="https://wa.me/{{ $outlet->whatsapp }}" target="_blank" rel="noopener noreferrer">Hubungi WhatsApp</a></p>
                    @endif
                    @if($outlet->slug === 'bekasi')
                        <p class="font-semibold text-amber-800">Lokasi maps sementara</p>
                    @endif
                </div>
            </div>
            <div class="rounded-3xl border border-stone-200 bg-white p-8 shadow-sm">
                <h2 class="mb-4 text-xl font-bold text-stone-900">Aksi Cepat</h2>
                <div class="space-y-3">
                    @if($outlet->google_maps_url)
                        <a href="{{ $outlet->google_maps_url }}" target="_blank" rel="noopener noreferrer" class="block rounded-2xl bg-stone-900 px-5 py-4 text-center font-semibold text-white transition hover:bg-stone-800">Petunjuk Arah Maps</a>
                    @endif
                    @if($outlet->instagram_url)
                        <a href="{{ $outlet->instagram_url }}" target="_blank" rel="noopener noreferrer" class="block rounded-2xl border border-stone-200 px-5 py-4 text-center font-semibold text-stone-700 transition hover:bg-stone-50">Instagram Outlet</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-[#f7f2ea] py-16">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <h2 class="mb-8 text-2xl font-extrabold text-stone-900" style="font-family:'Outfit',sans-serif;">Menu outlet</h2>
        <div class="space-y-10">
            @forelse($menuCategories as $category)
                @if($category->menuItems->count())
                    <div>
                        <h3 class="mb-4 text-xl font-bold text-stone-900">{{ $category->name }}</h3>
                        <div class="grid gap-4 md:grid-cols-2">
                            @foreach($category->menuItems as $item)
                                @php $image = $item->getFirstMediaUrl('image'); @endphp
                                <div class="overflow-hidden rounded-2xl border border-amber-100 bg-white shadow-sm">
                                    <div class="grid grid-cols-1 sm:grid-cols-[140px_1fr]">
                                        <div class="min-h-36 bg-gradient-to-br from-amber-100 to-stone-200">@if($image)<img src="{{ $image }}" alt="{{ $item->name }}" class="h-full w-full object-cover">@endif</div>
                                        <div class="p-5">
                                            <div class="flex items-start justify-between gap-4">
                                                <div>
                                                    <h4 class="font-bold text-stone-900">{{ $item->name }}</h4>
                                                    <p class="mt-2 text-sm text-stone-600">{{ $item->description }}</p>
                                                </div>
                                                <span class="whitespace-nowrap rounded-full border border-amber-100 bg-amber-50 px-3 py-1 text-sm font-semibold text-stone-900">Rp {{ number_format($item->getPriceForOutlet($outlet), 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-sm text-stone-500">Belum ada menu outlet yang aktif.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
