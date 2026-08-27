@extends('layouts.app')

@section('title', $page->meta_title ?? 'Hubungi Kami - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Hubungi kami melalui form kontak Piyoh Kopi.')

@section('content')
<div class="bg-amber-950 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1423666639041-f56000c29a9a?q=80&w=1200');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ $sections['page_title'] ?? 'Hubungi Kami' }}</h1>
        <p class="mt-4 text-amber-200 max-w-2xl mx-auto text-base sm:text-lg">
            {{ $sections['page_subtitle'] ?? 'Punya pertanyaan atau masukan? Silakan isi form di bawah.' }}
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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            
            <!-- Contact Info Sidebar -->
            <div class="md:col-span-1 space-y-8">
                <div>
                    <h3 class="text-lg font-bold text-stone-900 mb-4">Informasi Kontak</h3>
                    @php
                        $contactEmail = \App\Models\Setting::where('key', 'contact_email')->value('value') ?? 'info@piyohkopi.com';
                        $contactPhone = \App\Models\Setting::where('key', 'whatsapp')->value('value') ?? \App\Models\Setting::where('key', 'contact_phone')->value('value') ?? '0812-3999-9731';
                    @endphp
                    <div class="space-y-4 text-sm text-stone-600">
                        <p><strong>Email Brand:</strong><br><a href="mailto:{{ $contactEmail }}" class="hover:text-amber-800">{{ $contactEmail }}</a></p>
                        <p><strong>Hotline WA:</strong><br><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactPhone) }}" target="_blank" rel="noopener noreferrer" class="hover:text-amber-800">{{ $contactPhone }}</a></p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="md:col-span-2">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 mb-1">Nama Lengkap *</label>
                            <input type="text" name="name" required class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-800">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 mb-1">Alamat Email *</label>
                            <input type="email" name="email" required class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-800">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 mb-1">Nomor Telepon</label>
                            <input type="text" name="phone" class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-800">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 mb-1">Subjek Pesan</label>
                            <input type="text" name="subject" class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-800">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 mb-1">Isi Pesan Anda *</label>
                        <textarea name="message" rows="5" required class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-amber-800"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-amber-800 hover:bg-amber-900 text-white font-bold px-8 py-4 rounded-xl text-sm transition duration-300">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
