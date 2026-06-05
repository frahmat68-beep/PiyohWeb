@extends('layouts.app')

@section('title', $page->meta_title ?? 'Karir & Lowongan - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Bergabunglah bersama tim dinamis Piyoh Kopi.')

@section('content')
<div class="bg-amber-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1200');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ $sections['page_title'] ?? 'Tumbuh Bersama Piyoh Kopi' }}</h1>
        <p class="mt-4 text-amber-200 max-w-2xl mx-auto text-base sm:text-lg">
            {{ $sections['page_subtitle'] ?? 'Kami selalu mencari talenta berbakat yang memiliki passion tinggi.' }}
        </p>
    </div>
</div>

<div class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-8">
            @forelse($careers as $career)
                <div class="border border-amber-100 bg-white rounded-3xl p-8 hover:shadow-sm transition duration-300">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                        <h2 class="text-2xl font-bold text-stone-900">{{ $career->title }}</h2>
                        <div class="flex gap-2">
                            <span class="bg-amber-50 text-amber-800 text-xs font-semibold px-2.5 py-1 rounded-md">{{ $career->type }}</span>
                            <span class="bg-stone-100 text-stone-700 text-xs font-semibold px-2.5 py-1 rounded-md">{{ $career->location }}</span>
                        </div>
                    </div>
                    
                    <div class="text-stone-600 text-sm mb-6 space-y-2">
                        <p><strong>Departemen:</strong> {{ $career->department ?? 'General' }}</p>
                        @if($career->deadline)
                            <p><strong>Batas Lamaran:</strong> {{ $career->deadline->format('d M Y') }}</p>
                        @endif
                    </div>
                    
                    <div class="prose prose-amber max-w-none text-stone-700 text-sm mb-8">
                        <h4 class="font-bold text-stone-900 mb-2">Deskripsi Pekerjaan:</h4>
                        <p class="mb-4">{{ $career->description }}</p>
                        @if($career->requirements)
                            <h4 class="font-bold text-stone-900 mb-2">Persyaratan:</h4>
                            <p class="whitespace-pre-line">{{ $career->requirements }}</p>
                        @endif
                    </div>

                    <!-- Application Form -->
                    <div class="bg-amber-50/20 border border-amber-100/50 rounded-2xl p-6 mt-6">
                        <h3 class="font-bold text-stone-900 text-base mb-4">Lamar Posisi Ini</h3>
                        <form action="{{ route('careers.apply', $career->slug) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-semibold text-stone-500 mb-1">Nama Lengkap *</label>
                                <input type="text" name="name" required class="w-full bg-white border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-amber-800">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-stone-500 mb-1">Email Aktif *</label>
                                <input type="email" name="email" required class="w-full bg-white border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-amber-800">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-stone-500 mb-1">Nomor Telepon</label>
                                <input type="text" name="phone" class="w-full bg-white border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-amber-800">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-stone-500 mb-1">Upload CV (PDF, DOC) *</label>
                                <input type="file" name="resume" required class="w-full bg-white border border-stone-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-amber-800">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-stone-500 mb-1">Pesan Pengantar / Ringkasan Profile</label>
                                <textarea name="cover_letter" rows="3" class="w-full bg-white border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-amber-800"></textarea>
                            </div>
                            <div class="sm:col-span-2 pt-2">
                                <button type="submit" class="bg-amber-800 hover:bg-amber-900 text-white font-semibold px-6 py-3 rounded-xl text-sm transition duration-300">
                                    Kirim Lamaran Pekerjaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 border border-amber-50 rounded-3xl">
                    <p class="text-stone-500 text-sm">Saat ini belum ada lowongan pekerjaan yang dibuka.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
