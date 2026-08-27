@extends('layouts.app')
@section('title', $page->meta_title ?? 'Daftar Outlet - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Kunjungi cabang outlet terdekat kami.')
@section('content')
{{-- Hero Header --}}
<div class="relative overflow-hidden bg-[#161A14] text-white py-20 lg:py-28">
    <div class="absolute inset-0 bg-cover bg-center opacity-20 mix-blend-luminosity" style="background-image:url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/80 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <span class="inline-flex items-center gap-2 rounded-full border border-[#475638]/60 bg-[#475638]/20 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#C4823F]">
            Cabang & Lokasi
        </span>
        <h1 class="mt-4 text-4xl sm:text-5xl font-bold tracking-tight font-serif text-[#FAF7F2]">{{ $sections['page_title'] ?? 'Kunjungi Outlet Kami' }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-[#B2BBAE] leading-relaxed">{{ $sections['page_subtitle'] ?? 'Nikmati suasana slowbar yang hangat dan tenang bersama teman atau keluarga di outlet kami.' }}</p>
    </div>
</div>

{{-- Outlet List --}}
<div class="bg-[#FAF7F2] py-20 lg:py-28">
    <div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        @foreach($outlets as $outlet)
            @php $photo = $outlet->getFirstMediaUrl('photo'); @endphp
            <div class="overflow-hidden rounded-3xl border border-[#EBE4D8] bg-white p-0 shadow-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="h-56 bg-[#EBE4D8]/50 overflow-hidden relative">
                    @if($photo)
                        <img src="{{ $photo }}" alt="{{ $outlet->name }}" class="h-full w-full object-cover">
                    @else
                        <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                    @endif
                    <span class="absolute top-4 left-4 rounded-full bg-[#C4823F] px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-white shadow-sm">
                        {{ $outlet->city }}
                    </span>
                    <span class="absolute top-4 right-4 rounded-full px-3 py-1 text-xs font-bold shadow-sm {{ $outlet->is_active ? 'bg-emerald-600 text-white' : 'bg-stone-500 text-white' }}">
                        {{ $outlet->is_active ? 'Buka' : 'Nonaktif' }}
                    </span>
                </div>
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-[#22261E] font-serif">{{ $outlet->name }}</h2>
                    <p class="mt-3 text-sm leading-relaxed text-[#575E50]">{{ $outlet->description }}</p>
                    <div class="mt-6 space-y-2.5 border-t border-[#F3ECE1] pt-6 text-sm text-[#575E50]">
                        <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[70px]">Alamat:</span> <span>{{ $outlet->address }}</span></p>
                        <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[70px]">Jam Buka:</span> <span>{{ $outlet->opening_hours }}</span></p>
                        @if($outlet->slug === 'bekasi')
                            <p class="text-xs font-semibold text-[#C4823F] italic">Lokasi maps sementara</p>
                        @endif
                    </div>
                    <div class="mt-8">
                        <a href="{{ route('outlet.show', $outlet->slug) }}" class="block rounded-full bg-[#475638] hover:bg-[#36422A] px-6 py-3.5 text-center font-bold text-sm text-white transition shadow-sm">
                            Lihat Detail & Menu Outlet &rarr;
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
