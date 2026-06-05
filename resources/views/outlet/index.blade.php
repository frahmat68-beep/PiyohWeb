@extends('layouts.app')

@section('title', $page->meta_title ?? 'Daftar Outlet - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Kunjungi cabang outlet terdekat kami.')

@section('content')
<div class="bg-amber-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ $sections['page_title'] ?? 'Kunjungi Outlet Kami' }}</h1>
        <p class="mt-4 text-amber-200 max-w-2xl mx-auto text-base sm:text-lg">
            {{ $sections['page_subtitle'] ?? 'Nikmati suasana yang asyik bersama teman atau keluarga di outlet-outlet kami.' }}
        </p>
    </div>
</div>

<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            @foreach($outlets as $outlet)
                <div class="bg-amber-50/10 rounded-3xl border border-amber-100/50 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between">
                    <div class="p-8 sm:p-10">
                        <div class="flex items-center justify-between mb-6">
                            <span class="bg-amber-100 text-amber-900 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $outlet->city }}</span>
                            @if($outlet->is_active)
                                <span class="flex items-center gap-1.5 text-xs text-emerald-600 font-semibold">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Buka
                                </span>
                            @endif
                        </div>
                        <h2 class="text-2xl font-bold text-stone-900 mb-4">{{ $outlet->name }}</h2>
                        <p class="text-stone-600 mb-8 leading-relaxed text-sm">{{ $outlet->description }}</p>
                        
                        <div class="space-y-4 text-sm border-t border-amber-100/60 pt-6 text-stone-700">
                            <div class="flex gap-3">
                                <span class="font-semibold text-stone-900 w-24 flex-shrink-0">Alamat:</span>
                                <span>{{ $outlet->address }}</span>
                            </div>
                            <div class="flex gap-3">
                                <span class="font-semibold text-stone-900 w-24 flex-shrink-0">Jam Buka:</span>
                                <span>{{ $outlet->opening_hours }}</span>
                            </div>
                            <div class="flex gap-3">
                                <span class="font-semibold text-stone-900 w-24 flex-shrink-0">WhatsApp:</span>
                                <a href="https://wa.me/{{ $outlet->whatsapp }}" target="_blank" class="text-amber-800 font-medium hover:underline">{{ $outlet->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 pb-8 sm:px-10 sm:pb-10">
                        <a href="{{ route('outlet.show', $outlet->slug) }}" class="w-full text-center block bg-amber-800 hover:bg-amber-950 text-white font-bold py-4 rounded-2xl transition duration-300 shadow-md shadow-amber-900/5">
                            Lihat Detail & Menu Outlet
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
