# Pre-Launch Security & Hardening Review — PiyohWeb

Dokumen ini memuat hasil audit komprehensif terkait postur keamanan, proteksi endpoint publik, otorisasi peran pengguna, dan konfigurasi server sebelum peluncuran sistem **PiyohWeb** ke produksi.

---

## 1. Ringkasan Status Keamanan

| Parameter Keamanan | Status | Tindakan / Hasil Audit |
| :--- | :---: | :--- |
| **1. Rate Limiting** |  Hardened | Ditambahkan `throttle:10,1` pada form kontak dan `throttle:5,1` pada form lamaran karir untuk mitigasi spam dan DoS upload. |
| **2. Validasi & Mass Assignment** |  Aman | Input form publik divalidasi ketat (`mimes:pdf,doc,docx`, max 5MB, format email). Model `$fillable` terproteksi penuh. |
| **3. Konfigurasi Session & Cookie** |  Aman | `http_only` aktif (mencegah XSS membaca cookie), `same_site=lax` aktif (mitigasi CSRF). Di server produksi wajib `SESSION_SECURE_COOKIE=true` dengan HTTPS. |
| **4. Kebocoran Kredensial (.env)** |  Bersih | Riwayat git (`git log -p -- .env*`) diverifikasi bersih dari password asli / APP_KEY. Hanya `.env.example` kosong yang ter-commit. |
| **5. Role & Permission (Spatie)** |  Terisolasi | Resource sensitif (`Settings`, `Users`) dibatasi khusus `super_admin`. Peran `admin` hanya mengelola konten, dan `cashier` diblokir dari CMS web. |
| **6. Expose Informasi Sensitif** |  Aman | `APP_DEBUG=false` diwajibkan di server produksi untuk mencegah kebocoran stack trace error. |

---

## 2. Rincian Proteksi & Hardening

### A. Proteksi Endpoint Publik & Form Input
- **Form Kontak (`POST /contact`)**:
  - Dibatasi maksimum 10 request per menit per IP (`throttle:10,1`).
  - Validasi wajib: `name`, `email` (format RFC), dan `message` (minimal 10 karakter).
- **Form Karir (`POST /careers/{career}/apply`)**:
  - Dibatasi maksimum 5 submission per menit per IP (`throttle:5,1`).
  - Berkas CV/Resume dibatasi maksimum 5MB dengan ekstensi berkas yang diizinkan (`pdf`, `doc`, `docx`) dan dikelola melalui Spatie MediaLibrary.

### B. Matriks Hak Akses Panel CMS Filament
- `super_admin`: Akses penuh ke seluruh menu termasuk konfigurasi sistem dan manajemen user admin.
- `admin`: Mengelola Banner, Menu Kategori, Menu Items, Outlet, Halaman Dinamis, Lowongan Karir, dan Pesan Kontak Masuk.
- `cashier`: Tidak memiliki akses ke admin resource PiyohWeb.

---

## 3. Checklist Hardening Produksi (Server Kiki)
- [ ] Pastikan `APP_ENV=production` dan `APP_DEBUG=false` di `.env` server.
- [ ] Pastikan `SESSION_SECURE_COOKIE=true` di `.env` server saat SSL/HTTPS aktif.
- [ ] Pastikan permission storage diatur `chmod -R 775 storage bootstrap/cache`.
- [ ] Backup berkala database via Spatie Backup berjalan harian.

---
