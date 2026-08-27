# Checklist Audit & Kelengkapan Data Master — Piyoh Kopi (PiyohWeb)

Dokumen ini berisi hasil audit komprehensif terhadap kelengkapan dan konsistensi data master (outlet, menu, harga, pengaturan umum, dan tampilan publik) pada repositori **PiyohWeb**.

---

## 1. Ringkasan Eksekutif Hasil Audit

Audit dilakukan terhadap seluruh seeder di `database/seeders/` serta kesesuaian rendering pada `routes/web.php` dan `resources/views/`.

| Entitas Data | Status Saat Ini | Catatan Utama |
| :--- | :---: | :--- |
| **Outlet Galaxy** |  Valid | Alamat lengkap di Jaka Setia, kontak & jam operasional terisi. Link maps saat ini menggunakan link Waze. |
| **Outlet Bekasi** | ⚠️ Butuh Konfirmasi | Alamat, jam buka, dan kontak masih berupa teks sementara/placeholder (`null`), namun status `is_active = true`. |
| **Menu Items (27 item)** | ⚠️ Butuh Validasi Harga | 27 menu item telah terdaftar dan terhubung ke Galaxy Outlet. Perlu konfirmasi harga riil dan foto asli. |
| **Settings & Kontak** | ⚠️ Ditemukan Dummy | Terdapat nomor dummy hardcoded (`+62 812-3456-7890`) pada view `contact.blade.php`. |
| **Halaman Dinamis** |  Lengkap | Copywriting untuk Home, About, Outlet, Menu, Careers, dan Contact sudah terpasang. |

---

## 2. Checklist Wajib Dikonfirmasi Sebelum Launch (Critical / Blocker)

Daftar berikut wajib diputuskan bersama pemilik (*owner*) Piyoh Kopi sebelum website diluncurkan ke publik:

### A. Status & Detail Cabang (Outlets)
- [ ] **Status Outlet Bekasi (`is_active`)**:
  - Apakah outlet kedua di Bekasi sudah siap ditampilkan ke publik?
  - *Rekomendasi:* Jika outlet Bekasi belum grand opening atau belum memiliki alamat definitif, set `is_active = false` agar tidak membingungkan pelanggan.
- [ ] **Data Lengkap Outlet Bekasi (Jika Diaktifkan)**:
  - Alamat fisik lengkap (bukan *"Mengikuti titik lokasi pada Google Maps sementara"*).
  - Jam operasional resmi (bukan *"Menunggu konfirmasi"*).
  - Nomor telepon / WhatsApp resmi cabang.
  - Link Google Maps definitif.
- [ ] **Link Maps Outlet Galaxy**:
  - Saat ini kolom `google_maps_url` berisi link navigasi Waze (`https://www.waze.com/id/live-map/directions/...`).
  - *Konfirmasi:* Apakah ingin tetap menggunakan Waze atau diganti Google Maps resmi (`https://maps.google.com/...`)?

### B. Validasi Menu & Harga Jual (Pricing)
- [ ] **Validasi 27 Item Menu & Harga**:
  - **Coffee**:
    - [ ] Kopi Susu Piyoh (Rp 28.000)
    - [ ] Ice Caramel Machiato (Rp 33.000)
    - [ ] Hazelnut Latte (Rp 33.000)
    - [ ] Vanilla Latte (Rp 33.000)
    - [ ] Americano (Rp 25.000)
    - [ ] Cappuccino (Rp 28.000)
    - [ ] Mocha Cappuccino (Rp 33.000)
    - [ ] Cafe Latte (Rp 28.000)
  - **Non-Coffee**:
    - [ ] Chocolatte (Rp 28.000)
    - [ ] Taro (Rp 33.000)
    - [ ] Red Velvet (Rp 33.000)
    - [ ] Matcha Jasmine (Rp 33.000)
    - [ ] Ice Klepon (Rp 33.000)
    - [ ] Ice Ruma Regal (Rp 33.000)
  - **Mocktail**:
    - [ ] Choco Herby (Rp 38.000)
    - [ ] Strawberry Herb (Rp 38.000)
    - [ ] Ice Tropical Blend (Rp 30.000)
  - **Tea**:
    - [ ] Ice Lychee Tea (Rp 28.000)
    - [ ] Ice Lemon Tea (Rp 28.000)
    - [ ] Teh Tarik Khas Aceh (Rp 25.000)
  - **Paket Kumpul**:
    - [ ] 5 Gelas Es Kopi Susu Piyoh (Rp 115.000)
    - [ ] 2 Es Kopi Susu Piyoh + 2 Es Teh Tarik (Rp 90.000)
    - [ ] 1 Es Kopi Susu Piyoh + 1 Ice Americano (Rp 43.000)
  - **Pastry**:
    - [ ] Cheese Cake Danish (Rp 32.000)
    - [ ] Cinnamon Roll (Rp 32.000)
    - [ ] Reddish Danish (Rp 32.000)
    - [ ] Smoked Beef Moza (Rp 32.000)
- [ ] **Ketersediaan Menu Cabang Bekasi**:
  - Saat ini 27 menu hanya di-attach ke cabang Galaxy. Jika cabang Bekasi aktif, tentukan apakah menunya sama persis atau ada menu khusus.

### C. Kontak & Identitas Brand
- [ ] **Email & Nomor WhatsApp Utama**:
  - Email kontak resmi: saat ini `info@piyohkopi.com` (pastikan mailbox aktif untuk menerima pesan dari form kontak).
  - WhatsApp Hotline resmi: `0812-3999-9731` / `6281239999731`.
- [ ] **Perbaikan Dummy Hardcode pada Halaman Kontak**:
  - Pada `resources/views/contact.blade.php`, sidebar menampilkan nomor dummy `+62 812-3456-7890`. Harus disinkronkan menggunakan data `Setting::where('key', 'contact_phone')`.

---

## 3. Checklist Boleh Menyusul Setelah Launch (Non-Blocker / Enhancement)

Daftar berikut tidak menghambat peluncuran sistem dan dapat diperbarui secara bertahap melalui CMS Filament:

- [ ] **Penggantian Foto Menu Produk**:
  - Mengunggah foto fotografi produk asli resolusi tinggi untuk menggantikan thumbnail/placeholder di CMS.
- [ ] **Banner Promosi Musiman (Slider Beranda)**:
  - Mengunggah banner promo bulanan atau event khusus di menu CMS *Banners*.
- [ ] **Penyempurnaan Narasi "About Us"**:
  - Menyesuaikan kisah pendirian brand Piyoh Kopi, visi, misi, dan nilai brand di CMS *Pages*.
- [ ] **Papan Lowongan Karir (Careers)**:
  - Membuka lowongan barista / kitchen staff aktif melalui CMS *Careers* saat rekrutmen dibuka.
- [ ] **Penyesuaian Meta SEO Lanjutan**:
  - Optimasi keyword spesifik lokal per cabang untuk Google Search Console.

---

## 4. Daftar File Seeder Terkait yang Perlu Diedit Pasca Konfirmasi

Setelah owner memberikan data final, file berikut dapat diperbarui sesuai kebutuhan:

1. `database/seeders/OutletSeeder.php`
   - Update alamat definitif, kontak, dan `is_active` cabang Bekasi.
   - Update link Google Maps cabang Galaxy/Bekasi.
2. `database/seeders/MenuItemSeeder.php`
   - Update harga final dan relasi menu untuk cabang kedua.
3. `database/seeders/SettingSeeder.php`
   - Tambahkan key `whatsapp` agar footer layout membaca nomor WA secara dinamis.
4. `resources/views/contact.blade.php`
   - Ganti nomor dummy `+62 812-3456-7890` dengan variabel setting dinamis.

---

*Laporan dibuat otomatis sebagai bagian dari Tahap 1 Roadmap Go-Live Piyoh Kopi.*
