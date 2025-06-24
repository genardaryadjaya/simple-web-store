# Checklist Deployment ke InfinityFree

## ✅ Persiapan Lokal
- [ ] Backup database dari phpMyAdmin lokal
- [ ] Test semua fitur website di localhost
- [ ] Pastikan semua file lengkap
- [ ] Siapkan file `database_setup.sql`

## ✅ Setup InfinityFree
- [ ] Daftar akun di infinityfree.net
- [ ] Buat subdomain/domain
- [ ] Akses control panel
- [ ] Catat informasi hosting

## ✅ Setup Database
- [ ] Buat database MySQL di control panel
- [ ] Catat nama database, username, password
- [ ] Import file `database_setup.sql`
- [ ] Test koneksi database

## ✅ Upload File
- [ ] Upload semua file ke folder `htdocs`/`public_html`
- [ ] Pastikan struktur folder tetap sama
- [ ] Upload folder `admin/`, `css/`, `img/`
- [ ] Upload file `config.php`, `.htaccess`

## ✅ Konfigurasi
- [ ] Edit `config.php` dengan info database hosting
- [ ] Update `SITE_URL` dengan domain hosting
- [ ] Test koneksi database
- [ ] Set permission folder `img/` (777 jika perlu)

## ✅ Testing Website
- [ ] Buka website di browser
- [ ] Test halaman utama
- [ ] Test daftar produk
- [ ] Test detail produk
- [ ] Test keranjang belanja
- [ ] Test panel admin login
- [ ] Test CRUD produk
- [ ] Test upload gambar

## ✅ Keamanan
- [ ] Ganti password admin default
- [ ] Backup database hosting
- [ ] Test semua fitur keamanan
- [ ] Cek error log

## ✅ Dokumentasi
- [ ] Catat URL website
- [ ] Catat info login admin
- [ ] Catat info database
- [ ] Simpan backup file

## Troubleshooting Checklist
Jika ada error, cek:
- [ ] Info database di `config.php` sudah benar?
- [ ] Database sudah diimport dengan benar?
- [ ] File sudah upload ke folder yang benar?
- [ ] Permission folder sudah sesuai?
- [ ] Error log di control panel?

## Info Penting
- **URL Website:** ________________
- **Admin Login:** admin / admin123
- **Database Host:** sql.infinityfree.com
- **Database Name:** ________________
- **Database User:** ________________
- **Backup Date:** ________________ 