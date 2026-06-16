# Panduan Penyerahan Klien (Client Handover) — Piyoh Kopi Website

Panduan praktis ini ditujukan untuk pengelola non-teknis dalam mengelola konten, menu, outlet, dan melakukan pemeliharaan mandiri pada website Piyoh Kopi.

---

## 1. Informasi Akses Utama
*   **Alamat Website**: `http://213.35.118.26/`
*   **Halaman Admin (CMS)**: `http://213.35.118.26/admin`
*   **Cara Login**:
    1. Buka link Halaman Admin di atas.
    2. Masukkan email: `admin@piyohkopi.com`
    3. Masukkan password default Anda: `admin123`
    *(PENTING: Segera ubah password Anda setelah login pertama kali di menu User).*

---

## 2. Pengelolaan Menu Makanan & Minuman
1. Masuk ke halaman admin CMS.
2. Pada menu navigasi sebelah kiri, klik **Menu Items**.
3. Klik tombol **Create** di kanan atas untuk menambah menu baru.
4. Isi data menu:
   * **Nama**: Nama makanan/minuman (misal: "Es Kopi Susu Piyoh").
   * **Category**: Pilih kategori menu (misal: "Coffee").
   * **Base Price**: Harga dasar menu (masukkan angka saja tanpa titik/koma, misal: `22000`).
   * **Image**: Unggah foto menu yang menarik.
5. Klik **Save** untuk menyimpan.
6. *(Opsional)* Jika ingin mengubah kategori menu, Anda dapat mengaturnya pada menu **Menu Categories**.

---

## 3. Mengatur Harga Berbeda per Outlet
Secara bawaan, menu akan menggunakan **Base Price**. Namun, jika satu menu memiliki harga berbeda di outlet tertentu:
1. Klik menu **Menu Items**, lalu klik tombol **Edit** (ikon pensil) pada menu yang ingin diatur.
2. Scroll ke bagian bawah pada tabel **Outlet Overrides** atau hubungkan menu tersebut ke outlet terkait.
3. Masukkan harga khusus di kolom **Price Override** dan atur ketersediaan menu tersebut (Centang / Hilangkan centang *Is Available* jika menu sedang habis di outlet tersebut).

---

## 4. Mengubah Data Outlet
1. Di halaman admin CMS, klik menu **Outlets**.
2. Pilih outlet yang ingin diubah (contoh: "Galaxy" atau "Bekasi"), lalu klik **Edit**.
3. Anda dapat memperbarui informasi seperti:
   * Jam Operasional (*Opening Hours*)
   * Alamat Lengkap & Kota
   * Link Google Maps & Link Instagram
   * Nomor WhatsApp & Telepon Toko
4. Klik **Save Changes** untuk menyimpan data terbaru.

---

## 5. Mengunggah Banner Promosi (Homepage Slider)
1. Di halaman admin CMS, klik menu **Banners**.
2. Klik **Create** untuk membuat banner promosi baru.
3. Unggah gambar promosi, beri nama, dan pilih lokasi penempatan (misal: `home`).
4. Pastikan status dicentang **Active** agar muncul di halaman depan website.

---

## 6. Mengelola Pengguna (User Accounts)
1. Di halaman admin CMS, klik menu **Users**.
2. Anda dapat melihat daftar staf yang memiliki akses ke admin panel.
3. Untuk menambahkan akun baru (misal kasir atau admin konten baru):
   * Klik **Create**.
   * Isi Nama, Email, dan Password baru.
   * Pilih Role:
     * `super_admin`: Akses penuh ke seluruh sistem termasuk pengaturan sistem & user.
     * `admin`: Akses mengelola konten, menu, outlet, dan karir.
     * `cashier`: Hanya dapat melihat dasbor kasir tanpa akses edit data CMS.
4. Klik **Save**.

---

## 7. Melakukan Backup Database Manual
Untuk menjaga keamanan data transaksi dan menu Anda, disarankan melakukan backup berkala:
1. Hubungi administrator teknis atau jalankan perintah konsol berikut melalui SSH server:
   ```bash
   cd /var/www/piyoh-web
   php artisan backup:run --only-db
   ```
2. Hasil backup otomatis berupa file `.zip` berisi file database SQL akan tersimpan dengan aman di folder `/var/www/piyoh-web/storage/app/Piyoh Kopi`.
