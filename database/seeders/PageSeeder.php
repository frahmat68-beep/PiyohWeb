<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'meta_title' => 'Piyoh Kopi - Cita Rasa Kopi Nusantara Terkini',
                'meta_description' => 'Selamat datang di website resmi Piyoh Kopi. Temukan menu favorit Anda dan nikmati suasana nyaman di outlet terdekat.',
                'sections' => [
                    ['key' => 'hero_title', 'type' => 'text', 'value' => 'Setiap Tegukan Punya Cerita', 'sort_order' => 1],
                    ['key' => 'hero_subtitle', 'type' => 'text', 'value' => 'Piyoh Kopi menyajikan kopi pilihan berkualitas tinggi langsung ke meja Anda.', 'sort_order' => 2],
                    ['key' => 'about_preview', 'type' => 'text', 'value' => 'Piyoh Kopi adalah coffee shop yang menghadirkan racikan kopi modern dengan sentuhan tradisional lokal. Kami berkomitmen memberikan pengalaman terbaik melalui kualitas kopi premium, suasana hangat, dan layanan ramah untuk semua kalangan.', 'sort_order' => 3],
                ]
            ],
            [
                'title' => 'About Us',
                'slug' => 'about',
                'meta_title' => 'Tentang Kami - Piyoh Kopi',
                'meta_description' => 'Pelajari sejarah kami, nilai-nilai utama, dan misi kami dalam menyajikan kopi terbaik untuk Anda.',
                'sections' => [
                    ['key' => 'history', 'type' => 'text', 'value' => 'Piyoh Kopi bermula dari sebuah kedai kecil dengan visi menyajikan kopi nusantara berkualitas tinggi dengan harga yang bersahabat. Kami percaya bahwa setiap cangkir kopi memiliki cerita dan keunikan tersendiri yang perlu diapresiasi.', 'sort_order' => 1],
                    ['key' => 'vision', 'type' => 'text', 'value' => 'Menjadi coffee shop pilihan utama yang dikenal karena kualitas kopi premium, suasana nyaman, dan pelayanan yang hangat dan bersahabat.', 'sort_order' => 2],
                    ['key' => 'mission', 'type' => 'text', 'value' => '1. Menyajikan produk kopi & non-kopi berkualitas konsisten dengan harga terjangkau.\n2. Memberikan pelayanan yang ramah dan profesional.\n3. Membangun ruang komunitas yang nyaman untuk berkumpul, bekerja, atau belajar.\n4. Menciptakan pengalaman yang berkesan bagi setiap pelanggan.', 'sort_order' => 3],
                ]
            ],
            [
                'title' => 'Outlets',
                'slug' => 'outlet',
                'meta_title' => 'Lokasi Outlet Piyoh Kopi',
                'meta_description' => 'Temukan outlet Piyoh Kopi terdekat. Cek jam operasional dan petunjuk arah di sini.',
                'sections' => [
                    ['key' => 'page_title', 'type' => 'text', 'value' => 'Kunjungi Outlet Kami', 'sort_order' => 1],
                    ['key' => 'page_subtitle', 'type' => 'text', 'value' => 'Nikmati kopi hangat dan suasana yang asyik bersama teman atau keluarga di outlet kami yang nyaman.', 'sort_order' => 2],
                ]
            ],
            [
                'title' => 'Our Menu',
                'slug' => 'menu',
                'meta_title' => 'Menu Favorit Piyoh Kopi',
                'meta_description' => 'Lihat daftar lengkap menu kopi, non-kopi, dan makanan ringan pilihan di Piyoh Kopi.',
                'sections' => [
                    ['key' => 'page_title', 'type' => 'text', 'value' => 'Eksplorasi Rasa Unik Kami', 'sort_order' => 1],
                    ['key' => 'page_subtitle', 'type' => 'text', 'value' => 'Dari signature coffee hingga minuman non-kopi dan pastry lezat. Ketersediaan dapat berbeda di setiap outlet.', 'sort_order' => 2],
                ]
            ],
            [
                'title' => 'Careers',
                'slug' => 'careers',
                'meta_title' => 'Karir & Kesempatan Bergabung - Piyoh Kopi',
                'meta_description' => 'Bergabunglah bersama tim dinamis kami. Temukan berbagai lowongan karir menarik di Piyoh Kopi.',
                'sections' => [
                    ['key' => 'page_title', 'type' => 'text', 'value' => 'Tumbuh Bersama Piyoh Kopi', 'sort_order' => 1],
                    ['key' => 'page_subtitle', 'type' => 'text', 'value' => 'Kami selalu mencari talenta berbakat yang memiliki passion tinggi dalam memberikan yang terbaik kepada pelanggan kami.', 'sort_order' => 2],
                ]
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'meta_title' => 'Hubungi Piyoh Kopi',
                'meta_description' => 'Kirimkan pertanyaan, kritik, atau saran untuk Piyoh Kopi melalui form kontak ini.',
                'sections' => [
                    ['key' => 'page_title', 'type' => 'text', 'value' => 'Hubungi Kami', 'sort_order' => 1],
                    ['key' => 'page_subtitle', 'type' => 'text', 'value' => 'Punya pertanyaan atau masukan? Silakan isi form di bawah dan tim kami akan segera membalasnya.', 'sort_order' => 2],
                ]
            ],
        ];

        foreach ($pages as $p) {
            $page = Page::updateOrCreate(
                ['slug' => $p['slug']],
                [
                    'title' => $p['title'],
                    'meta_title' => $p['meta_title'],
                    'meta_description' => $p['meta_description'],
                    'is_active' => true,
                ]
            );

            // Recreate sections
            $page->sections()->delete();
            foreach ($p['sections'] as $sec) {
                $page->sections()->create($sec);
            }
        }
    }
}
