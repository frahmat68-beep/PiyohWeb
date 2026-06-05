@extends('layouts.app')
@section('title', $page->meta_title ?? 'Daftar Outlet - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Kunjungi cabang outlet terdekat kami.')
@section('content')
<div class="bg-[#1c120b] text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image:url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200');"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl" style="font-family:'Outfit',sans-serif;">{{ $sections['page_title'] ?? 'Kunjungi Outlet Kami' }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base text-amber-100/90 sm:text-lg">{{ $sections['page_subtitle'] ?? 'Nikmati suasana yang asyik bersama teman atau keluarga di outlet-outlet kami.' }}</p>
    </div>
</div>
<div class="bg-white py-20">
    <div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        @foreach($outlets as $outlet)
            @php $photo = $outlet->getFirstMediaUrl('photo'); @endphp
            <div class="overflow-hidden rounded-3xl border border-amber-100 bg-amber-50/20 p-0 shadow-sm">
                <div class="h-52 bg-gradient-to-br from-amber-100 to-stone-200">@if($photo)<img src="{{ $photo }}" alt="{{ $outlet->name }}" class="h-full w-full object-cover">@endif</div>
                <div class="p-8">
                    <div class="mb-4 flex items-center justify-between gap-4">
                        <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] text-amber-900">{{ $outlet->city }}</span>
                        <span class="text-xs font-semibold {{ $outlet->is_active ? 'text-emerald-600' : 'text-stone-500' }}">{{ $outlet->is_active ? 'Buka' : 'Nonaktif' }}</span>
                    </div>
                    <h2 class="text-2xl font-bold text-stone-900">{{ $outlet->name }}</h2>
                    <p class="mt-3 text-sm leading-6 text-stone-600">{{ $outlet->description }}</p>
                    <div class="mt-6 space-y-3 border-t border-amber-100 pt-6 text-sm text-stone-700">
                        <p><span class="font-semibold text-stone-900">Alamat:</span> {{ $outlet->address }}</p>
                        <p><span class="font-semibold text-stone-900">Jam Buka:</span> {{ $outlet->opening_hours }}</p>
                        @if($outlet->slug === 'bekasi')
                            <p class="font-semibold text-amber-800">Lokasi maps sementara</p>
                        @endif
                    </div>
                    <div class="mt-6"><a href="{{ route('outlet.show', $outlet->slug) }}" class="block rounded-2xl bg-stone-900 px-5 py-4 text-center font-semibold text-white transition hover:bg-stone-800">Lihat Detail & Menu Outlet</a></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
