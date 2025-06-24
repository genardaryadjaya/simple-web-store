# Manual Book & Panduan Deployment Website ZeowStyle

Dokumen ini berisi panduan lengkap untuk instalasi, konfigurasi, dan deployment aplikasi website shopping PHP & MySQL "ZeowStyle".

---

## Daftar Isi
1.  [Deskripsi Proyek](#1-deskripsi-proyek)
2.  [Struktur Folder](#2-struktur-folder)
3.  [Instalasi di Komputer Lokal (XAMPP)](#3-instalasi-di-komputer-lokal-xampp)
4.  [Panduan Deployment ke Hosting Online (InfinityFree)](#4-panduan-deployment-ke-hosting-online-infinityfree)
5.  [Fitur Aplikasi](#5-fitur-aplikasi)
6.  [Informasi Login Admin](#6-informasi-login-admin)

---

### 1. Deskripsi Proyek
**ZeowStyle** adalah aplikasi website e-commerce fungsional yang dibangun menggunakan PHP dan MySQL. Proyek ini mencakup:
*   **Frontend:** Tampilan publik dimana pengunjung dapat melihat produk, detail produk, dan menambahkan produk ke keranjang belanja.
*   **Backend (Panel Admin):** Area terproteksi dengan login untuk mengelola data produk (Create, Read, Update, Delete - CRUD), termasuk upload banyak gambar.
*   **Database:** Menggunakan MySQL untuk menyimpan data produk, gambar produk, dan informasi admin.
*   **Fitur Modern:** Keranjang belanja interaktif berbasis popup (modal) tanpa perlu refresh halaman.

### 2. Struktur Folder
```
/shopping-website
|
|-- admin/                # Folder untuk semua file backend (panel admin)
|   |-- inc/
|   |   |-- db.php        # Skrip koneksi database
|   |-- _header.php       # File header standar untuk admin
|   |-- _footer.php       # File footer standar untuk admin
|   |-- dashboard.php     # Halaman dashboard admin
|   |-- index.php         # Halaman login admin
|   |-- product_form.php  # Formulir tambah/edit produk
|   |-- products.php      # Halaman manajemen produk (tabel CRUD)
|   `-- logout.php        # Skrip untuk logout
|
|-- css/                  # File-file styling CSS
|-- img/                  # Folder untuk menyimpan semua gambar produk
|-- js/                   # File-file JavaScript
|
|-- .htaccess             # File konfigurasi server untuk keamanan
|-- about-us.php          # Halaman Tentang Kami
|-- add_cart.php          # Skrip backend untuk memproses keranjang
|-- blog.php              # Halaman Blog
|-- config.php            # File konfigurasi utama (database, URL, dll)
|-- contact.php           # Halaman Kontak
|-- database_setup.sql    # Skrip SQL untuk membuat database & tabel
|-- header.php            # File header standar untuk frontend
|-- index.php             # Halaman utama (Beranda)
|-- product-details.php   # Halaman untuk melihat detail satu produk
`-- products.php          # Halaman untuk melihat semua produk
```

### 3. Instalasi di Komputer Lokal (XAMPP)
1.  **Unduh & Instal XAMPP:** Pastikan Anda memiliki XAMPP terinstal (yang berisi Apache, MySQL, PHP).
2.  **Salin Folder Proyek:** Salin seluruh folder `shopping-website` ke dalam folder `htdocs` di direktori instalasi XAMPP Anda (contoh: `C:/xampp/htdocs/`).
3.  **Buat Database:**
    *   Buka browser dan akses `http://localhost/phpmyadmin`.
    *   Klik "New" untuk membuat database baru. Beri nama `shopping_db`.
    *   Pilih database `shopping_db` yang baru dibuat.
    *   Klik tab "Import".
    *   Klik "Choose File" dan pilih file `database_setup.sql` dari dalam folder proyek.
    *   Klik "Go" di bagian bawah untuk memulai proses import. Semua tabel dan data contoh akan dibuat secara otomatis.
4.  **Konfigurasi (Opsional):** File `config.php` sudah diatur untuk berjalan di localhost. Tidak perlu ada perubahan.
5.  **Jalankan Website:** Buka browser dan akses `http://localhost/shopping-website`. Website Anda siap digunakan.

---

### 4. Panduan Deployment ke Hosting Online (InfinityFree)

Ikuti langkah ini untuk membuat website Anda online.

**Langkah 1: Siapkan File & Database Lokal**
1.  **Kompres Proyek:** Buat file ZIP dari seluruh folder proyek `shopping-website` Anda. Ini akan mempercepat proses upload.
2.  **Ekspor Database:** Anda tidak perlu melakukan ini karena kita sudah punya file `database_setup.sql` yang berisi struktur dan data awal.

**Langkah 2: Setup Akun InfinityFree**
1.  Buka [infinityfree.net](https://infinityfree.net) dan buat akun baru.
2.  Setelah login, buat sebuah "Hosting Account". Anda akan diminta memilih subdomain gratis (misal: `zeowstyle.infinityfreeapp.com`).
3.  Buka **Control Panel** untuk akun hosting yang baru Anda buat.

**Langkah 3: Upload File Proyek**
1.  Di Control Panel, cari dan buka **"File Manager"**.
2.  Masuk ke dalam folder `htdocs`. **PENTING: Jangan upload di luar folder ini.**
3.  Gunakan tombol **"Upload"** dan pilih **"Upload Archive"**. Pilih file `shopping-website.zip` yang Anda buat tadi.
4.  Setelah selesai, klik kanan pada file ZIP tersebut dan pilih **"Extract"**. Ini akan mengekstrak semua file Anda ke dalam `htdocs`.

**Langkah 4: Setup Database di Hosting**
1.  Kembali ke Control Panel, cari dan buka **"MySQL Databases"**.
2.  Di bagian "Create a new database", masukkan nama database (misal: `zeowstyle_db`) dan klik **"Create Database"**.
3.  **CATAT INFORMASI PENTING:** InfinityFree akan menampilkan:
    *   **MySQL Host Name:** (Contoh: `sql201.infinityfree.com`)
    *   **MySQL Database Name:** (Contoh: `if0_12345678_zeowstyle_db`)
    *   **MySQL User Name:** (Contoh: `if0_12345678`)
    *   **MySQL Password:** (Password akun InfinityFree Anda)
4.  Selanjutnya, buka **"phpMyAdmin"** dari Control Panel.
5.  Pilih database yang baru Anda buat (contoh: `if0_12345678_zeowstyle_db`).
6.  Gunakan fitur **"Import"** untuk mengupload file `database_setup.sql` dari komputer Anda, sama seperti yang Anda lakukan di localhost.

**Langkah 5: Konfigurasi Final**
1.  Kembali ke **File Manager**, buka folder `shopping-website`.
2.  Cari file `config.php`, klik kanan, dan pilih **"Edit"**.
3.  Ubah baris-baris berikut dengan informasi yang Anda catat di Langkah 4:
    ```php
    // GANTI INI:
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'shopping_db');
    define('SITE_URL', 'http://localhost/shopping-website');

    // MENJADI SEPERTI INI (gunakan data Anda sendiri):
    define('DB_HOST', 'sql201.infinityfree.com'); // <-- Hostname dari InfinityFree
    define('DB_USERNAME', 'if0_12345678'); // <-- Username dari InfinityFree
    define('DB_PASSWORD', 'password_akun_infinityfree_anda'); // <-- Password Anda
    define('DB_NAME', 'if0_12345678_zeowstyle_db'); // <-- Nama DB dari InfinityFree
    define('SITE_URL', 'http://zeowstyle.infinityfreeapp.com'); // <-- URL website online Anda
    ```
4.  **Simpan** file `config.php`.

**Langkah 6: Selesai!**
Website Anda sekarang sudah online! Buka URL Anda (misal: `http://zeowstyle.infinityfreeapp.com`) di browser untuk melihatnya. Lakukan tes pada semua fitur untuk memastikan semuanya berjalan lancar.

### 5. Fitur Aplikasi
*   **Manajemen Produk:** Admin dapat menambah, melihat, mengedit, dan menghapus produk.
*   **Upload Gambar:** Mendukung upload satu gambar utama dan banyak gambar tambahan untuk setiap produk.
*   **Sistem Diskon:** Admin dapat menetapkan harga normal dan harga diskon.
*   **Keranjang Belanja:** Pengguna dapat menambahkan item ke keranjang. Isi keranjang ditampilkan di popup tanpa refresh halaman.
*   **Halaman Dinamis:** Semua halaman produk dan detail produk mengambil data langsung dari database.

### 6. Informasi Login Admin
*   **URL:** `http://url-website-anda.com/admin`
*   **Username:** `admin`
*   **Password:** `admin123`

*(Sangat disarankan untuk mengubah password default setelah login pertama demi keamanan)*. 