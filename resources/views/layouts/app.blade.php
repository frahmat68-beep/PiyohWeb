<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Piyoh Kopi - Cita Rasa Kopi Nusantara Terkini')</title>
    <meta name="description" content="@yield('meta_description', 'Nikmati cita rasa kopi premium racikan nusantara terbaik hanya di Piyoh Kopi.')">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Vite Asset) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-amber-50/30 text-stone-800 flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-amber-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-extrabold text-amber-900 tracking-tight flex items-center gap-2">
                        <span class="bg-amber-800 text-white w-10 h-10 rounded-xl flex items-center justify-center shadow-md shadow-amber-900/10">P</span>
                        <span>Piyoh<span class="text-amber-600 font-light">Kopi</span></span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-stone-600 hover:text-amber-800 py-2 transition-colors duration-200 {{ request()->routeIs('home') ? 'text-amber-800 border-b-2 border-amber-800 font-semibold' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="text-stone-600 hover:text-amber-800 py-2 transition-colors duration-200 {{ request()->routeIs('about') ? 'text-amber-800 border-b-2 border-amber-800 font-semibold' : '' }}">About</a>
                    <a href="{{ route('outlet.index') }}" class="text-stone-600 hover:text-amber-800 py-2 transition-colors duration-200 {{ request()->routeIs('outlet.*') ? 'text-amber-800 border-b-2 border-amber-800 font-semibold' : '' }}">Outlet</a>
                    <a href="{{ route('menu') }}" class="text-stone-600 hover:text-amber-800 py-2 transition-colors duration-200 {{ request()->routeIs('menu') ? 'text-amber-800 border-b-2 border-amber-800 font-semibold' : '' }}">Menu</a>
                    <a href="{{ route('careers') }}" class="text-stone-600 hover:text-amber-800 py-2 transition-colors duration-200 {{ request()->routeIs('careers') ? 'text-amber-800 border-b-2 border-amber-800 font-semibold' : '' }}">Careers</a>
                    <a href="{{ route('contact') }}" class="text-stone-600 hover:text-amber-800 py-2 transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-amber-800 border-b-2 border-amber-800 font-semibold' : '' }}">Contact</a>
                </nav>

                <!-- Right Action Button -->
                <div class="hidden md:flex items-center">
                    <a href="{{ route('menu') }}" class="bg-amber-800 hover:bg-amber-950 text-white px-5 py-2.5 rounded-full text-sm font-semibold shadow-lg shadow-amber-900/10 transition-all duration-300 transform hover:-translate-y-0.5">
                        Pesan Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-lg text-stone-500 hover:text-amber-800 hover:bg-amber-50 focus:outline-none transition-colors duration-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-amber-50">
            <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3 text-base font-medium">
                <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('home') ? 'bg-amber-50 text-amber-900 font-semibold' : 'text-stone-600 hover:bg-stone-50' }}">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('about') ? 'bg-amber-50 text-amber-900 font-semibold' : 'text-stone-600 hover:bg-stone-50' }}">About</a>
                <a href="{{ route('outlet.index') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('outlet.*') ? 'bg-amber-50 text-amber-900 font-semibold' : 'text-stone-600 hover:bg-stone-50' }}">Outlet</a>
                <a href="{{ route('menu') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('menu') ? 'bg-amber-50 text-amber-900 font-semibold' : 'text-stone-600 hover:bg-stone-50' }}">Menu</a>
                <a href="{{ route('careers') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('careers') ? 'bg-amber-50 text-amber-900 font-semibold' : 'text-stone-600 hover:bg-stone-50' }}">Careers</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-lg {{ request()->routeIs('contact') ? 'bg-amber-50 text-amber-900 font-semibold' : 'text-stone-600 hover:bg-stone-50' }}">Contact</a>
                <div class="pt-4 pb-2 px-3 border-t border-stone-100">
                    <a href="{{ route('menu') }}" class="w-full text-center block bg-amber-800 text-white px-4 py-3 rounded-full text-sm font-semibold shadow-md shadow-amber-900/10">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-400 pt-16 pb-8 border-t-4 border-amber-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div>
                <a href="{{ route('home') }}" class="text-2xl font-extrabold text-white tracking-tight flex items-center gap-2 mb-6">
                    <span class="bg-amber-800 text-white w-10 h-10 rounded-xl flex items-center justify-center">P</span>
                    <span>Piyoh<span class="text-amber-500 font-light">Kopi</span></span>
                </a>
                <p class="text-stone-400 text-sm leading-relaxed mb-6">
                    Menyajikan racikan kopi nusantara autentik dengan nuansa kekinian dan ramah pelanggan. Tempat terbaik untuk menikmati seduhan berkualitas tinggi.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-9 h-9 rounded-full bg-stone-800 flex items-center justify-center text-white hover:bg-amber-700 transition-colors duration-200">IG</a>
                    <a href="#" class="w-9 h-9 rounded-full bg-stone-800 flex items-center justify-center text-white hover:bg-amber-700 transition-colors duration-200">FB</a>
                    <a href="#" class="w-9 h-9 rounded-full bg-stone-800 flex items-center justify-center text-white hover:bg-amber-700 transition-colors duration-200">WA</a>
                </div>
            </div>
            <div>
                <h4 class="text-white font-bold text-base mb-6 tracking-wide uppercase">Navigasi Cepat</h4>
                <ul class="space-y-3.5 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-amber-400 transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ route('outlet.index') }}" class="hover:text-amber-400 transition-colors">Daftar Outlet</a></li>
                    <li><a href="{{ route('menu') }}" class="hover:text-amber-400 transition-colors">Menu Favorit</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-amber-400 transition-colors">Karir & Peluang</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-amber-400 transition-colors">Hubungi Kami</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-base mb-6 tracking-wide uppercase">Cabang Outlet</h4>
                <ul class="space-y-3.5 text-sm">
                    <li><a href="{{ route('outlet.show', 'galaxy') }}" class="hover:text-amber-400 transition-colors">Piyoh Galaxy (Pekanbaru)</a></li>
                    <li><a href="{{ route('outlet.show', 'bekasi') }}" class="hover:text-amber-400 transition-colors">Piyoh Bekasi Barat</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-base mb-6 tracking-wide uppercase">Kontak Hubung</h4>
                <p class="text-stone-400 text-sm leading-relaxed mb-4">
                    Punya masukan atau ingin bermitra dengan Piyoh Kopi? Hubungi tim support kami.
                </p>
                <div class="text-sm space-y-2.5">
                    <p><span class="text-white font-medium">Email:</span> info@piyohkopi.com</p>
                    <p><span class="text-white font-medium">Telepon:</span> +62 812-3456-7890</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-stone-850 text-center text-xs text-stone-500">
            &copy; {{ date('Y') }} Piyoh Kopi. Hak Cipta Dilindungi Undang-Undang.
        </div>
    </footer>

    <!-- Mobile Navbar Script -->
    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
