@extends('layouts.app')

@section('title', $page->meta_title ?? 'Hubungi Kami - Piyoh Kopi')
@section('meta_description', $page->meta_description ?? 'Hubungi kami melalui form kontak atau hotline resmi Piyoh Kopi.')

@section('content')
{{-- Hero Header --}}
<div class="relative overflow-hidden bg-[#161A14] text-white py-24 lg:py-32">
    <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity scale-105" style="background-image: url('https://images.unsplash.com/photo-1423666639041-f56000c29a9a?q=80&w=1400');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#161A14] via-[#161A14]/85 to-transparent"></div>
    <div class="relative mx-auto max-w-7xl 2xl:max-w-[1600px] px-4 text-center sm:px-6 lg:px-10 2xl:px-16">
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight font-serif text-[#FAF7F2]">{{ $sections['page_title'] ?? 'Hubungi Kami' }}</h1>
        <p class="mt-5 text-[#B2BBAE] max-w-2xl mx-auto text-base sm:text-xl font-light leading-relaxed">
            {{ $sections['page_subtitle'] ?? 'Punya pertanyaan seputar menu, kerjasama, atau masukan untuk outlet kami? Silakan hubungi tim kami.' }}
        </p>
    </div>
</div>

<div class="py-20 lg:py-28 bg-[#FAF7F2]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-8 p-5 bg-[#F0FDF4] border border-[#BBF7D0] text-[#15803D] rounded-2xl text-sm font-semibold flex items-center gap-3 shadow-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            
            <!-- Contact Info Sidebar -->
            <div class="md:col-span-1 space-y-6">
                <div class="rounded-3xl border border-[#EBE4D8] bg-white p-7 shadow-sm space-y-6">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2.5 h-6 bg-[#475638] rounded-full"></span>
                        <h3 class="text-lg font-bold text-[#22261E] font-serif">Kontak Resmi</h3>
                    </div>
                    @php
                        $contactEmail = \App\Models\Setting::where('key', 'contact_email')->value('value') ?? 'info@piyohkopi.com';
                        $contactPhone = \App\Models\Setting::where('key', 'whatsapp')->value('value') ?? \App\Models\Setting::where('key', 'contact_phone')->value('value') ?? '0812-3999-9731';
                    @endphp
                    <div class="space-y-4 text-sm text-[#575E50]">
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-wider text-[#889180] mb-1">Email Resmi</span>
                            <a href="mailto:{{ $contactEmail }}" class="text-[#475638] font-medium hover:underline">{{ $contactEmail }}</a>
                        </div>
                        <div class="pt-3 border-t border-[#F3ECE1]">
                            <span class="block text-xs font-bold uppercase tracking-wider text-[#889180] mb-1">Hotline WhatsApp</span>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactPhone) }}" target="_blank" rel="noopener noreferrer" class="text-[#475638] font-medium hover:underline">{{ $contactPhone }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="md:col-span-2">
                <div class="rounded-3xl border border-[#EBE4D8] bg-white p-8 sm:p-10 shadow-sm">
                    <h3 class="text-xl font-bold text-[#22261E] font-serif mb-6">Kirim Pesan</h3>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#575E50] mb-1.5">Nama Lengkap *</label>
                                <input type="text" name="name" required placeholder="Masukkan nama Anda" class="w-full bg-[#FAF7F2] border border-[#DDD4C5] rounded-xl px-4 py-3 text-sm text-[#22261E] focus:outline-none focus:border-[#475638] focus:ring-1 focus:ring-[#475638] transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#575E50] mb-1.5">Alamat Email *</label>
                                <input type="email" name="email" required placeholder="nama@email.com" class="w-full bg-[#FAF7F2] border border-[#DDD4C5] rounded-xl px-4 py-3 text-sm text-[#22261E] focus:outline-none focus:border-[#475638] focus:ring-1 focus:ring-[#475638] transition">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#575E50] mb-1.5">Nomor WhatsApp</label>
                                <input type="text" name="phone" placeholder="Contoh: 08123456789" class="w-full bg-[#FAF7F2] border border-[#DDD4C5] rounded-xl px-4 py-3 text-sm text-[#22261E] focus:outline-none focus:border-[#475638] focus:ring-1 focus:ring-[#475638] transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#575E50] mb-1.5">Subjek</label>
                                <input type="text" name="subject" placeholder="Perihal pesan" class="w-full bg-[#FAF7F2] border border-[#DDD4C5] rounded-xl px-4 py-3 text-sm text-[#22261E] focus:outline-none focus:border-[#475638] focus:ring-1 focus:ring-[#475638] transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#575E50] mb-1.5">Pesan Anda *</label>
                            <textarea name="message" rows="5" required placeholder="Tuliskan pesan atau pertanyaan Anda..." class="w-full bg-[#FAF7F2] border border-[#DDD4C5] rounded-xl px-4 py-3 text-sm text-[#22261E] focus:outline-none focus:border-[#475638] focus:ring-1 focus:ring-[#475638] transition"></textarea>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="rounded-full bg-[#475638] hover:bg-[#36422A] text-white font-bold px-8 py-3.5 text-sm transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                Kirim Pesan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
