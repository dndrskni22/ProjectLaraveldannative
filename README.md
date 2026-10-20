# Inventory Management System — SweetGlaze & Brews 🍩☕

Kumpulan tugas mata kuliah Pemrograman Web yang mengerjakan studi kasus yang sama, yaitu **aplikasi manajemen inventaris produk toko donat dan minuman**, dengan dua pendekatan berbeda:

| Folder | Materi | Deskripsi |
| :--- | :--- | :--- |
| [`inventory-native/`](inventory-native/) | **Pertemuan 4** — Relational Database + Advanced PHP | Mini Project 3: Inventory Management System berbasis **PHP Native & MySQL** |
| [`inventory-laravel/`](inventory-laravel/) | **Pertemuan 5** — Laravel Fundamental | Migrasi aplikasi P4 ke **Laravel** dengan arsitektur MVC |

Intinya, Pertemuan 4 adalah memahami masalah bisnisnya lewat PHP native, lalu Pertemuan 5 merapikan dan memindahkan aplikasi yang sama ke Laravel — framework berganti, tapi konsep dan fiturnya tetap.

---

## 📁 1. inventory-native (Pertemuan 4 — PHP Native)

Aplikasi manajemen katalog produk berbasis PHP Native dan MySQL. Selain CRUD, fokus tugas ini ada pada penerapan praktik pengembangan web yang benar: keamanan data, pola alur kerja, dan antarmuka responsif.

### Fitur
- **CRUD produk** — tambah, lihat, edit, dan hapus produk lengkap dengan unggah gambar (JPG, JPEG, PNG, WEBP, maks 2 MB).
- **Pencarian & filter** — cari produk berdasarkan nama atau kategori lewat parameter GET.
- **Keamanan**:
  - PDO Prepared Statements untuk mencegah SQL Injection.
  - `htmlspecialchars()` untuk mencegah XSS.
  - Token CSRF pada aksi hapus/update, diverifikasi dengan `hash_equals()`.
  - Validasi server-side (nama minimal 3 karakter, harga positif, stok non-negatif, nama unik).
- **Pola Post-Redirect-Get (PRG)** — mencegah data terkirim dua kali saat halaman di-refresh.
- **Tampilan responsif** menggunakan CSS Grid.

### Cara Menjalankan
1. Pindahkan folder `inventory-native` ke `C:\xampp\htdocs\`.
2. Nyalakan **Apache** dan **MySQL** di XAMPP, lalu impor `database/store_db.sql` lewat phpMyAdmin.
3. Sesuaikan kredensial database di `config/db.php` bila perlu.
4. Buka `http://localhost/inventory-native/public/index.php`.

Dokumentasi lengkapnya ada di [`inventory-native/README.md`](inventory-native/README.md).

---

## 📁 2. inventory-laravel (Pertemuan 5 — Laravel)

Versi Laravel dari aplikasi yang sama. Aplikasi disusun dengan arsitektur **MVC**: request ditangani route, diolah resource controller, berinteraksi dengan model Eloquent, lalu ditampilkan lewat Blade.

### Fitur
- **Routing dengan `Route::resource`** — satu baris route untuk seluruh operasi CRUD produk.
- **Resource Controller** (`ProductController`) dengan route model binding (`Product $product`).
- **Validasi request** — nama produk wajib dan unik, harga numerik minimal 0, stok integer non-negatif, gambar bertipe jpg/png/gif maks 2 MB.
- **Upload gambar** ke folder `public/uploads`.
- **Migration** untuk tabel `products`.
- **Blade template** — layout bersama di `layouts/app.blade.php` beserta halaman daftar, form tambah, dan form edit.
- **Flash message** sebagai notifikasi berhasil/tidaknya aksi.

### Cara Menjalankan
```bash
cd inventory-laravel
composer install
cp .env.example .env
php artisan key:generate
```
1. Buat database MySQL dengan nama `store_db`, lalu sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di file `.env`.
2. Jalankan migration:
   ```bash
   php artisan migrate
   ```
3. Nyalakan server:
   ```bash
   php artisan serve
   ```
4. Buka `http://127.0.0.1:8000`.

---

## 🛠️ Teknologi

| Teknologi | inventory-native | inventory-laravel |
| :--- | :--- | :--- |
| Bahasa | PHP 8.x | PHP 8.x (Laravel 8) |
| Database | MySQL (PDO) | MySQL (Eloquent ORM) |
| Frontend | HTML5, CSS3 (Grid/Flexbox) | Blade Template |
| Server | Apache / XAMPP | Artisan Serve / XAMPP |

---

## 👤 Penulis

**Adinda Riskiani** — [dndrskni22](https://github.com/dndrskni22)
