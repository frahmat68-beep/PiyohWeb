# Laporan Audit Visual & QA — Piyoh Kopi Website

Dokumen ini mencatat hasil pengujian Visual Quality Assurance (QA) secara detail untuk seluruh halaman publik Piyoh Kopi Website baik pada resolusi desktop maupun simulasi responsive mobile.

---

## 1. Parameter Penilaian Visual
Setiap halaman diperiksa berdasarkan indikator berikut:
*   **Spacing & Alignment**: Keseimbangan jarak (*padding/margin*) dan kelurusan elemen.
*   **Typography**: Kesesuaian font (*Plus Jakarta Sans* & *Outfit*) dan kontras teks.
*   **Navbar & Footer**: Konsistensi navigasi atas dan bawah.
*   **Broken Image & Ratio**: Pengecekan ada tidaknya gambar yang pecah atau aspek rasio yang tidak proporsional.
*   **Overflow & Responsive**: Memastikan tidak ada pergeseran tata letak menyamping (*horizontal scroll*) di mobile.

---

## 2. Hasil Audit Per Halaman

### A. Home Page (`/`)
*   **Desktop**:
    *   Hero banner ter-render penuh dengan aspect-ratio yang presisi.
    *   Grid outlet dan menu unggulan (*featured menu*) sejajar dengan pembatas kontainer.
    *   Navbar memuat logo dengan tajam di sebelah kiri dan navigasi menu di kanan.
*   **Mobile & Tablet**:
    *   Menu navigasi bertransformasi menjadi ikon hamburger di sisi kanan atas.
    *   Ketika hamburger di-klik, overlay menu menutupi layar dengan smooth dan interaksi penutupan (`X`) berjalan lancar.
    *   Teks hero banner mengecil dan terpusat (*centered*) secara rapi.
*   **Temuan**: Tidak ada masalah visual.

### B. About Page (`/about`)
*   **Desktop**:
    *   Typography hirarki `h1` dan `p` memiliki keterbacaan yang sangat baik dengan kontras warna stone-800 di atas latar belakang warm-cream.
*   **Mobile**:
    *   Paragraf cerita brand dan visi misi otomatis tersusun vertikal (*single-column stack*) secara harmonis.
*   **Temuan**: Tidak ada masalah visual.

### C. Menu Page (`/menu`)
*   **Desktop**:
    *   Grid menu menampilkan kategori makanan dan minuman secara terstruktur.
    *   Foto menu memiliki aspect-ratio yang sama sehingga tinggi kartu (*cards*) terlihat seragam.
*   **Mobile**:
    *   Ukuran foto dan nama menu menyesuaikan lebar layar hp (tanpa terpotong).
*   **Temuan**: Tidak ada masalah visual.

### D. Outlet Page (`/outlet` & `/outlet/{slug}`)
*   **Desktop**:
    *   Peta Google Maps tersemat dengan lebar penuh (*full-width*) di halaman detail.
    *   Card informasi kontak (jam buka, no telp, whatsapp) sejajar di sisi samping.
*   **Mobile**:
    *   Layout bergeser ke susunan vertikal dengan urutan: Foto Outlet -> Jam Buka & Kontak -> Peta Lokasi.
*   **Temuan**: Tidak ada masalah visual.

### E. Contact Page (`/contact`)
*   **Desktop**:
    *   Form isian (Nama, Email, Telp, Subjek, Pesan) tampil bersih dengan rounded corners.
*   **Mobile**:
    *   Lebar input box membesar otomatis memenuhi 100% lebar layar ponsel.
*   **Temuan**: Pengujian kirim pesan melalui form kontak berhasil memunculkan notifikasi sukses hijau (*Success Alert*) dengan alignment teks yang tepat.

### F. Careers Page (`/careers`)
*   **Desktop & Mobile**:
    *   Tabel lowongan kerja serta tombol kirim lamaran (*Apply*) berfungsi normal dengan tata letak tombol yang konsisten.
*   **Temuan**: Tidak ada masalah visual.

---

## 3. Hasil Temuan Kategori

*   **Critical**: `0` Issue
*   **Major**: `0` Issue
*   **Minor**: `0` Issue
*   **Cosmetic**: `0` Issue

---

## Kesimpulan

Seluruh visual elemen, transisi hamburger menu, form interaktif, pemuatan aset gambar logo, serta font keluarga Google Fonts telah teruji lulus tanpa ada kejanggalan tata letak (*layout shifting* atau *overflow*).

**READY FOR CLIENT REVIEW**
