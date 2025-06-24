# Panduan Deployment ke InfinityFree

## Persiapan Sebelum Upload

### 1. Backup Database Lokal
1. Buka phpMyAdmin di XAMPP
2. Pilih database `shopping_db`
3. Klik tab "Export"
4. Pilih "Custom" dan pastikan format SQL
5. Klik "Go" untuk download file `.sql`

### 2. Siapkan File Website
1. Pastikan semua file website sudah lengkap
2. File penting yang harus ada:
   - `index.php`
   - `admin/` folder (semua file admin)
   - `css/` folder
   - `img/` folder
   - `config.php`
   - `database_setup.sql`

## Langkah-langkah Deployment ke InfinityFree

### 1. Daftar dan Setup Hosting
1. Kunjungi [infinityfree.net](https://infinityfree.net)
2. Daftar akun gratis
3. Buat subdomain atau gunakan domain gratis
4. Akses control panel

### 2. Setup Database
1. Di control panel InfinityFree, cari "MySQL Databases"
2. Buat database baru:
   - Database name: `nama_database_anda`
   - Username: `username_database_anda`
   - Password: `password_kuat_anda`
3. Catat informasi database yang diberikan

### 3. Import Database
1. Buka phpMyAdmin dari control panel InfinityFree
2. Pilih database yang baru dibuat
3. Klik tab "Import"
4. Upload file `database_setup.sql` yang sudah disiapkan
5. Klik "Go" untuk import

### 4. Upload File Website
1. Di control panel, buka "File Manager"
2. Masuk ke folder `htdocs` atau `public_html`
3. Upload semua file website ke folder tersebut
4. Pastikan struktur folder tetap sama

### 5. Konfigurasi Website
1. Edit file `config.php`
2. Ubah pengaturan database:
```php
define('DB_HOST', 'sql.infinityfree.com');
define('DB_USERNAME', 'username_database_anda');
define('DB_PASSWORD', 'password_kuat_anda');
define('DB_NAME', 'nama_database_anda');
define('SITE_URL', 'https://domain-anda.infinityfreeapp.com');
```

### 6. Test Website
1. Buka website Anda di browser
2. Test fitur-fitur utama:
   - Halaman utama
   - Daftar produk
   - Detail produk
   - Keranjang belanja
3. Test panel admin:
   - Login admin (username: admin, password: admin123)
   - CRUD produk
   - Upload gambar

## Troubleshooting

### Error Koneksi Database
- Pastikan informasi database di `config.php` sudah benar
- Cek apakah database sudah dibuat dan diimport dengan benar

### Error Upload File
- Pastikan folder `img/` memiliki permission write
- Cek ukuran file tidak melebihi limit hosting

### Website Tidak Muncul
- Pastikan file `index.php` ada di root folder
- Cek error log di control panel

## Keamanan
1. Ganti password admin default setelah login pertama
2. Backup database secara berkala
3. Update file website secara rutin

## Support
Jika mengalami masalah, cek:
- Forum InfinityFree
- Dokumentasi InfinityFree
- Error log di control panel 