# System Architecture Document — QR Table Ordering System (Phase 1)

Dokumen ini mendokumentasikan analisis sistem dan rencana arsitektur teknis untuk penambahan fitur QR Table Ordering System ke dalam codebase Laravel + Filament CMS **Piyoh Kopi** yang sudah ada. Fitur ini dirancang dengan arsitektur multi-outlet yang scalable.

---

## 1. Existing Database Schema
Berikut adalah struktur tabel yang saat ini terpasang dalam sistem database Piyoh Kopi:

*   **`users`**: Menyimpan data pengguna admin/staf (id, name, email, password, dll).
*   **`outlets`**: Menyimpan informasi outlet fisik (id, name, slug, address, phone, whatsapp, email, opening_hours, dll).
*   **`pages` & `page_sections`**: Menyimpan halaman statis profile perusahaan dan seksi kontennya.
*   **`banners`**: Banner promosi yang dapat diasosiasikan per outlet.
*   **`menu_categories`**: Kategori menu global (id, name, slug, sort_order).
*   **`menu_items`**: Menu global (id, menu_category_id, name, slug, description, base_price, is_active, is_featured).
*   **`menu_item_outlet`**: Tabel pivot multi-outlet untuk menu (id, menu_item_id, outlet_id, price_override, is_available) untuk menyimpan harga custom dan ketersediaan menu per outlet.
*   **`careers` & `job_applications`**: Pengelolaan lowongan pekerjaan dan aplikasinya.
*   **`settings`**: Pengaturan global.

---

## 2. Existing MenuItem Relation
Model `MenuItem` terhubung dengan tabel lain melalui relasi berikut:
*   **`category`** (`BelongsTo`): Terhubung ke `MenuCategory` menggunakan foreign key `menu_category_id`.
*   **`outlets`** (`BelongsToMany`): Terhubung ke model `Outlet` melalui tabel pivot `menu_item_outlet` untuk menyimpan data harga overrides (`price_override`) dan ketersediaan menu (`is_available`) spesifik per outlet.

---

## 3. Existing Outlet Relation
Model `Outlet` terhubung dengan:
*   **`banners`** (`HasMany`): Banner promosi yang ditargetkan untuk outlet tertentu.
*   **`menuItems`** (`BelongsToMany`): Hubungan sebaliknya ke `MenuItem` via pivot `menu_item_outlet` untuk menyaring menu apa saja yang tersedia di outlet tersebut.

---

## 4. Rekomendasi Tabel Baru (Database Migrations)

Untuk mendukung sistem QR Table Ordering, direkomendasikan penambahan 3 tabel berikut dengan relasi integritas referensial yang kuat:

### A. Tabel `cafe_tables`
Menyimpan data meja fisik per outlet yang akan digunakan untuk generate kode QR.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `outlet_id` (BIGINT, Foreign Key -> `outlets.id`, ON DELETE CASCADE)
*   `table_number` (VARCHAR, nomor meja unik per outlet, contoh: "A1", "B5")
*   `capacity` (INTEGER, kapasitas kursi meja, nullable)
*   `status` (VARCHAR, status meja: 'active', 'inactive', 'occupied', default 'active')
*   `qr_code_token` (VARCHAR, token enkripsi/unik untuk URL QR, unique index)
*   `timestamps` & `softDeletes`
*   *Index*: `UNIQUE(outlet_id, table_number)`

### B. Tabel `orders`
Menyimpan transaksi order dari pelanggan.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `outlet_id` (BIGINT, Foreign Key -> `outlets.id`, ON DELETE RESTRICT)
*   `cafe_table_id` (BIGINT, Foreign Key -> `cafe_tables.id`, ON DELETE RESTRICT)
*   `order_reference` (VARCHAR, kode order unik untuk pencarian kasir, misal: `PYH-20260616-0001`, unique)
*   `customer_name` (VARCHAR, nama pelanggan yang memesan)
*   `status` (VARCHAR, status order: 'pending', 'confirmed', 'processing', 'completed', 'cancelled', default 'pending')
*   `payment_status` (VARCHAR, status pembayaran: 'unpaid', 'paid', default 'unpaid')
*   `payment_method` (VARCHAR, metode pembayaran: 'cash', 'qris', 'e-wallet', dll, nullable)
*   `subtotal` (DECIMAL(10,2), total harga item sebelum pajak/servis)
*   `tax` (DECIMAL(10,2), nilai pajak PPN)
*   `service_charge` (DECIMAL(10,2), biaya layanan)
*   `total_amount` (DECIMAL(10,2), total tagihan akhir setelah pajak dan servis)
*   `notes` (TEXT, catatan khusus dari pelanggan, nullable)
*   `timestamps`

### C. Tabel `order_items`
Menyimpan detail item menu yang dipesan dalam satu order.
*   `id` (BIGINT, Primary Key, Auto Increment)
*   `order_id` (BIGINT, Foreign Key -> `orders.id`, ON DELETE CASCADE)
*   `menu_item_id` (BIGINT, Foreign Key -> `menu_items.id`, ON DELETE RESTRICT)
*   `quantity` (INTEGER, jumlah pesanan)
*   `unit_price` (DECIMAL(10,2), harga satuan saat dipesan. Diambil dari `price_override` outlet atau fallback `base_price`)
*   `subtotal` (DECIMAL(10,2), quantity * unit_price)
*   `notes` (VARCHAR, catatan per item menu, misal: "Kurang manis", "Es dipisah", nullable)
*   `timestamps`

---

## 5. Rekomendasi Model & Relasi Eloquent

### A. Model `CafeTable`
*   `belongsTo(Outlet::class)`
*   `hasMany(Order::class)`
*   *Helper Methods*:
    *   `generateQrCodeUrl()`: Menghasilkan link unik QR Code (menggunakan token `qr_code_token`) untuk ditempel di meja fisik.

### B. Model `Order`
*   `belongsTo(Outlet::class)`
*   `belongsTo(CafeTable::class)`
*   `hasMany(OrderItem::class)`
*   *Helper Methods & Booting*:
    *   `booted()`: Otomatis men-generate `order_reference` unik saat pembuatan order baru.

### C. Model `OrderItem`
*   `belongsTo(Order::class)`
*   `belongsTo(MenuItem::class)`

---

## 6. Rekomendasi Filament Resources (CMS Admin Panel)

Untuk mengelola sistem QR Order, kita akan menambahkan resource berikut di Filament Admin:

1.  **`CafeTableResource`**:
    *   **Form**: Input nomor meja, kapasitas, status (active/inactive), select outlet.
    *   **Table**: List meja per outlet, filter berdasarkan status & outlet.
    *   **Custom Action**: Tombol **"Download QR Code"** untuk mencetak stiker QR Code meja.
2.  **`OrderResource`**:
    *   **Table**: Menampilkan seluruh transaksi masuk. Custom tabs berdasarkan status pesanan (`Pending`, `Processing`, `Completed`, `Cancelled`).
    *   **RelationManager**: Menampilkan `order_items` (menu, qty, unit_price, subtotal, notes).
    *   **Custom Actions**:
        *   Tombol "Confirm Order" (mengubah status ke `confirmed` / `processing`).
        *   Tombol "Mark as Paid" (mengubah status ke `paid` & update metode pembayaran).
        *   Tombol "Complete Order" (mengubah status ke `completed`).
        *   Tombol "Cancel Order" (membatalkan pesanan).

---

## 7. Rekomendasi Customer Routes (Frontend)

*   **Pindai QR**: `GET /order/{outlet:slug}/table/{qr_code_token}`
    *   *Deskripsi*: Pelanggan scan QR Code di meja. Route ini memvalidasi keberadaan outlet dan token meja, lalu menyimpan `outlet_id`, `cafe_table_id`, dan `table_number` di session pelanggan.
    *   *Redirect*: Mengalihkan pelanggan ke halaman menu pemesanan outlet.
*   **Menu & Order Pemesanan**: `GET /order/{outlet:slug}`
    *   *Deskripsi*: Menampilkan menu digital khusus untuk order di outlet tersebut. Menggunakan session meja untuk mengunci pemesanan pada nomor meja yang terdeteksi. Hanya menampilkan menu yang bertanda `is_available` di outlet tersebut dengan harga yang sesuai (`price_override` jika ada).
*   **Simpan Pesanan (Checkout)**: `POST /order/{outlet:slug}/checkout`
    *   *Deskripsi*: Pelanggan mengirimkan daftar keranjang belanja, nama pemesan, dan catatan ke database.
    *   *Redirect*: Dialihkan ke halaman status pesanan (`GET /order/status/{order_reference}`).
*   **Status Pesanan**: `GET /order/status/{order_reference}`
    *   *Deskripsi*: Halaman live update bagi pelanggan untuk memantau status pesanan mereka (apakah sedang dimasak, siap dihidangkan, atau sudah selesai).

---

## 8. Rekomendasi Cashier Workflow (Alur Kasir)

1.  **Notifikasi Order Masuk**: Kasir melihat pesanan baru di panel Filament dengan status `Pending`.
2.  **Verifikasi & Konfirmasi**: Kasir melakukan konfirmasi ke meja pelanggan (jika diperlukan pembayaran di awal/akhir tergantung kebijakan outlet) lalu menekan tombol **"Confirm Order"**. Status pesanan berubah menjadi `confirmed`/`processing`.
3.  **Pembayaran (Payment)**:
    *   Jika pelanggan membayar ke kasir menggunakan Tunai/QRIS statis, Kasir menekan action **"Mark as Paid"**, memilih metode pembayaran, lalu sistem memperbarui `payment_status` menjadi `paid`.
4.  **Penyelesaian**: Setelah semua makanan selesai dihidangkan, Kasir menandai pesanan sebagai **"Completed"** yang membebaskan status meja tersebut menjadi `active`/`ready` kembali.

---

## 9. Rekomendasi Kitchen Workflow (Alur Dapur)

Untuk dapur (Kitchen Staff), agar tidak membebani server, direkomendasikan halaman dasbor dapur real-time yang sederhana:
1.  **Daftar Antrean Masak (Kitchen Dashboard)**:
    *   Sebuah halaman Filament Dashboard khusus (atau custom view yang auto-refresh setiap 30 detik menggunakan Livewire poll) yang hanya memfilter pesanan dengan status `confirmed` atau `processing`.
2.  **Detail per Meja**: Dapur melihat daftar item menu beserta kuantitas dan catatan memasak pelanggan (contoh: "Pedas sekali", "Es tidak pakai gula").
3.  **Aksi Dapur**:
    *   Tombol **"Start Cooking"**: Mengubah status item/order menjadi sedang diproses.
    *   Tombol **"Ready to Serve"**: Mengirimkan sinyal ke pelayan bahwa makanan siap diantarkan ke meja pelanggan.
