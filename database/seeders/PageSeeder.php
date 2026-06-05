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
                    ['key' => 'about_preview', 'type' => 'text', 'value' => 'Berdiri sejak tahun 2020, Piyoh Kopi berkomitmen memperkenalkan kopi racikan modern dengan sentuhan tradisional lokal yang dicintai semua kalangan.', 'sort_order' => 3],
                ]
            ],
            [
                'title' => 'About Us',
                'slug' => 'about',
                'meta_title' => 'Tentang Kami - Perjalanan Piyoh Kopi',
                'meta_description' => 'Pelajari sejarah kami, nilai-nilai utama, dan misi kami dalam menyajikan kopi terbaik untuk Anda.',
                'sections' => [
                    ['key' => 'history', 'type' => 'text', 'value' => 'Piyoh Kopi bermula dari sebuah kedai kecil berbekal mimpi menyajikan kopi nusantara terbaik dengan harga yang bersahabat.', 'sort_order' => 1],
                    ['key' => 'vision', 'type' => 'text', 'value' => 'Menjadi jaringan gerai kopi pilihan utama masyarakat Indonesia yang mengedepankan kualitas, keramahan, dan inovasi rasa.', 'sort_order' => 2],
                    ['key' => 'mission', 'type' => 'text', 'value' => '1. Menyajikan produk kopi & non-kopi berkualitas konsisten.\n2. Memberikan pelayanan yang ramah dan bersahabat.\n3. Membangun ruang komunitas yang nyaman.', 'sort_order' => 3],
                ]
            ],
            [
                'title' => 'Outlets',
                'slug' => 'outlet',
                'meta_title' => 'Lokasi Outlet Piyoh Kopi',
                'meta_description' => 'Temukan outlet Piyoh Kopi terdekat di kota Anda. Cek jam operasional dan petunjuk arah di sini.',
                'sections' => [
                    ['key' => 'page_title', 'type' => 'text', 'value' => 'Kunjungi Outlet Kami', 'sort_order' => 1],
                    ['key' => 'page_subtitle', 'type' => 'text', 'value' => 'Nikmati kopi hangat dan suasana yang asyik bersama teman atau keluarga di outlet-outlet kami.', 'sort_order' => 2],
                ]
            ],
            [
                'title' => 'Our Menu',
                'slug' => 'menu',
                'meta_title' => 'Menu Favorit Piyoh Kopi',
                'meta_description' => 'Lihat daftar lengkap menu kopi, non-kopi, makanan ringan, dan hidangan utama andalan Piyoh Kopi.',
                'sections' => [
                    ['key' => 'page_title', 'type' => 'text', 'value' => 'Eksplorasi Rasa Unik Kami', 'sort_order' => 1],
                    ['key' => 'page_subtitle', 'type' => 'text', 'value' => 'Dari Signature Coffee hingga hidangan lezat peneman bersantai Anda.', 'sort_order' => 2],
                ]
            ],
            [
                'title' => 'Careers',
                'slug' => 'careers',
                'meta_title' => 'Karir & Kesempatan Bergabung - Piyoh Kopi',
                'meta_description' => 'Bergabunglah bersama tim dinamis kami. Temukan berbagai lowongan karir menarik di Piyoh Kopi.',
                'sections' => [
                    ['key' => 'page_title', 'type' => 'text', 'value' => 'Tumbuh Bersama Piyoh Kopi', 'sort_order' => 1],
                    ['key' => 'page_subtitle', 'type' => 'text', 'value' => 'Kami selalu mencari talenta berbakat yang memiliki passion tinggi untuk menyajikan kebahagiaan lewat segelas kopi.', 'sort_order' => 2],
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
