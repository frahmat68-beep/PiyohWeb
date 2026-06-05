@extends('layouts.app')
@section('title', $page->meta_title ?? 'Karir & Lowongan - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Bergabunglah bersama tim dinamis Piyoh Kopi.')
@section('content')
<div class="bg-[#1c120b] text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image:url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1200');"></div>
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl" style="font-family:'Outfit',sans-serif;">{{ $sections['page_title'] ?? 'Tumbuh Bersama Piyoh Kopi' }}</h1>
        <p class="mx-auto mt-4 max-w-2xl text-base text-amber-100/90 sm:text-lg">{{ $sections['page_subtitle'] ?? 'Kami selalu mencari talenta berbakat yang memiliki passion tinggi.' }}</p>
    </div>
</div>
<div class="bg-white py-20"><div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8"><div class="rounded-3xl border border-amber-100 bg-amber-50/20 p-8 text-center text-stone-600"><p>Belum ada posisi aktif. Silakan pantau halaman ini.</p></div></div></div>
@endsection
