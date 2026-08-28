@extends('layouts.app')
@section('title', $page->meta_title ?? 'Daftar Outlet — Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Kunjungi cabang outlet terdekat kami dan nikmati racikan kopi terbaik.')
@section('content')

{{-- Hero Header --}}
<section class="relative overflow-hidden bg-[#161A14] text-white py-20 lg:py-28">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity scale-105" style="background-image:url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1400');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/85 to-transparent"></div>
    
    <div class="relative mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 text-center sm:px-6 lg:px-10 2xl:px-16">
        <h1 class="text-4xl sm:text-6xl font-bold tracking-tight font-serif text-[#FAF7F2]">
            {{ $sections['page_title'] ?? 'Kunjungi Outlet Kami' }}
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-base sm:text-lg text-[#B2BBAE] font-light leading-relaxed">
            {{ $sections['page_subtitle'] ?? 'Nikmati suasana slowbar yang hangat dan tenang bersama teman atau keluarga di outlet kami.' }}
        </p>
    </div>
</section>

{{-- Outlet List --}}
<section class="reveal-on-scroll bg-[#FAF7F2] py-20 lg:py-28">
    <div class="mx-auto grid max-w-7xl 2xl:max-w-[1600px] gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-10 2xl:px-16">
        @foreach($outlets as $outlet)
            @php $photo = $outlet->getImageUrl(); @endphp
            <div class="overflow-hidden rounded-3xl border border-[#EBE4D8] bg-white shadow-2xs transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="h-64 bg-[#EBE4D8]/50 overflow-hidden relative">
                        @if($photo)
                            <img src="{{ $photo }}" alt="{{ $outlet->name }}" class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                        @else
                            <div class="h-full w-full flex items-center justify-center text-[#889180] font-serif text-sm">Piyoh Kopi</div>
                        @endif
                        <span class="absolute top-4 left-4 rounded-full bg-[#C4823F] px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-white shadow-sm">
                            {{ $outlet->city }}
                        </span>
                        @if($outlet->isOpenNow())
                            <span class="absolute top-4 right-4 rounded-full px-3.5 py-1 text-xs font-bold shadow-sm bg-emerald-700 text-white flex items-center gap-1.5 backdrop-blur-xs">
                                <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
                                Buka
                            </span>
                        @else
                            <span class="absolute top-4 right-4 rounded-full px-3.5 py-1 text-xs font-bold shadow-sm bg-[#575E50] text-[#FAF7F2] flex items-center gap-1.5 backdrop-blur-xs">
                                <span class="w-2 h-2 rounded-full bg-stone-300"></span>
                                Tutup
                            </span>
                        @endif
                    </div>
                    <div class="p-8">
                        <h2 class="text-2xl sm:text-3xl font-bold text-[#22261E] font-serif">{{ $outlet->name }}</h2>
                        <p class="mt-3 text-sm leading-relaxed text-[#575E50]">{{ $outlet->description }}</p>
                        <div class="mt-6 space-y-2.5 border-t border-[#F3ECE1] pt-6 text-sm text-[#575E50]">
                            <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[75px]">Alamat:</span> <span>{{ $outlet->address }}</span></p>
                            <p class="flex items-start gap-2"><span class="font-bold text-[#22261E] min-w-[75px]">Jam Buka:</span> <span>{{ $outlet->opening_hours }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="px-8 pb-8 pt-2">
                    <a href="{{ route('outlet.show', $outlet->slug) }}" class="touch-target-44 block rounded-full bg-[#475638] hover:bg-[#36422A] px-6 py-3.5 text-center font-bold text-sm text-white transition shadow-sm">
                        Lihat Detail & Menu Outlet &rarr;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
