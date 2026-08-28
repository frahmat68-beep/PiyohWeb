# Checklist Audit & Kelengkapan Data Master — Piyoh Kopi (PiyohWeb)

Dokumen ini berisi hasil audit komprehensif terhadap kelengkapan dan konsistensi data master (outlet, menu, harga, pengaturan umum, dan tampilan publik) pada repositori **PiyohWeb**.

---

## 1. Ringkasan Eksekutif Hasil Audit

Audit dilakukan terhadap seluruh seeder di `database/seeders/` serta kesesuaian rendering pada `routes/web.php` dan `resources/views/`.

| Entitas Data | Status Saat Ini | Catatan Utama |
| :--- | :---: | :--- |
| **Outlet Galaxy** |  Valid | Alamat lengkap di Jaka Setia, kontak & jam operasional terisi. Link maps saat ini menggunakan link Waze. |
| **Outlet Jaktim** | ⚠️ Non-Aktif (Pending Launch) | Alamat Ryu Padel, kontak & jam operasional terisi, status `is_active = false`. Menunggu konfirmasi kesiapan rilis. |
| **Menu Items (62 item, 11 kategori)** |  Tervalidasi Resmi | Menu & harga per 28 Agustus 2026 telah final dikonfirmasi dari foto papan menu asli owner (62 item, 11 kategori). Foto produk masih placeholder, perlu diganti foto asli. |
| **Settings & Kontak** |  Valid | Hotline WhatsApp resmi `0812-3999-9731` dan email `info@piyohkopi.com` terhubung dinamis. |
| **Halaman Dinamis** |  Lengkap | Copywriting untuk Home, About, Outlet, Menu, Careers, dan Contact sudah terpasang. |

---

## 2. Checklist Wajib Dikonfirmasi Sebelum Launch (Critical / Blocker)

Daftar berikut wajib diputuskan bersama pemilik (*owner*) Piyoh Kopi sebelum website diluncurkan ke publik:

### A. Status & Detail Cabang (Outlets)
- [ ] **Outlet Kedua (Piyoh Jaktim / Ryu Padel)**:
  - **Lokasi & Venue:** Berlokasi di dalam venue olahraga Ryu Padel (Jl. Kincan Raya No. 22, RT.1/RW.12, Pondok Kelapa, Duren Sawit, Jakarta Timur).
  - **Menu & Pricing:** Apakah menu dan harga sama dengan Galaxy atau berbeda karena berbagi tempat (*shared venue*) dengan bisnis lain? (*BELUM dikonfirmasi, jangan diasumsikan sama*).
  - **Kontak Cabang:** Menggunakan hotline utama (`0812-3999-9731`). Konfirmasi jika ada nomor khusus cabang Jaktim.
  - **Status Publikasi (`is_active`):** Tetap `false` sampai owner mengonfirmasi kesiapan rilis resmi ke publik.
- [ ] **Link Maps Outlet Galaxy**:
  - Saat ini kolom `google_maps_url` berisi link navigasi Waze (`https://www.waze.com/id/live-map/directions/...`).
  - *Konfirmasi:* Apakah ingin tetap menggunakan Waze atau diganti Google Maps resmi (`https://maps.google.com/...`)?

### B. Validasi Menu & Harga Jual (Pricing)
- [x] **Validasi Menu & Harga Resmi (62 Item, 11 Kategori)**:
  - **Status**: Menu & harga per 28 Agustus 2026 sudah **FINAL** dikonfirmasi dari foto papan menu fisik asli owner.
  - **Daftar Kategori**: Hot Coffee (9), Iced Coffee (9), Non Coffee (4), Signature Drink (7), Manual Brew (2), Artisan Tea (5), Blended (5), Iced Tea (7), Barista's Present (4), Choco Series (6), Additional (4).
  - **Catatan Harga Variatif**: `Import Beans` diset `price = null` (ditampilkan sebagai "Tanya Barista" / harga variatif).
  - **Catatan Foto Produk**: Foto produk masih menggunakan placeholder royalty-free per kategori, perlu diganti foto fotografi produk asli melalui CMS Filament.
- [ ] **Cakupan Menu Outlet Kedua (Piyoh Jaktim)**:
  - Saat ini seluruh 62 menu hanya di-attach ke cabang Galaxy (`menu_item_outlet`).
  - *Perlu Konfirmasi:* Apakah seluruh 62 menu ini berlaku sama untuk cabang Piyoh Jaktim, atau cabang Jaktim memiliki subset menu khusus? (*BELUM dikonfirmasi, jangan diasumsikan sama*).

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
