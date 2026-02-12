# Alpha Kost - Landing Page & Admin Panel (CI4)

Aplikasi Landing Page dinamis untuk manajemen kost yang dibangun dengan **CodeIgniter 4**. Aplikasi ini memungkinkan admin untuk mengelola data kamar, profil kost, testimoni, dan galeri foto secara real-time. 

## Fitur Utama

* 
**Landing Page Dinamis**: Menampilkan informasi kamar, fasilitas, dan lokasi Google Maps secara otomatis. 


* 
**Direct WhatsApp**: Integrasi pesan otomatis ke Pak Raji untuk pemesanan kamar. 


* 
**Admin Panel Terproteksi**: Login sistem untuk mengelola konten website. 


* **Full CRUD**: Manajemen Kamar, Testimoni, dan Galeri Foto (Upload Gambar).
* 
**Editable Settings**: Ubah nama kost, alamat, dan nomor HP langsung dari dashboard. 



---

## Langkah Instalasi

Ikuti urutan langkah di bawah ini untuk menjalankan proyek di lingkungan lokal Anda:

### 1. Clone Repositori

Buka terminal atau CMD, lalu jalankan perintah berikut:

```bash
git clone https://github.com/username/002-catalog-kost.git
cd 002-catalog-kost

```

### 2. Instalasi Dependency

Pastikan Anda sudah menginstal **Composer**, lalu jalankan:

```bash
composer install

```

### 3. Konfigurasi Environment (.env)

Salin file `env` menjadi `.env`:

```bash
cp env .env

```

Buka file `.env` dan sesuaikan pengaturan database Anda:

```ini
database.default.hostname = localhost
database.default.database = nama_db_anda
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi

```

### 4. Persiapan Folder Upload

Buat folder untuk menyimpan gambar galeri agar fitur upload berjalan lancar:

```bash
mkdir -p public/uploads/gallery

```

### 5. Menjalankan Migrasi Database

Buat struktur tabel (Kamar, Testimoni, Settings, Users, dan Gallery) dengan satu perintah:

```bash
php spark migrate

```

### 6. Menjalankan Seeder (Data Default)

Isi database dengan data awal **Alpha Kost** (termasuk akun admin default): 

```bash
php spark db:seed KostSeeder
php spark db:seed AdminSeeder

```

### 7. Jalankan Server

Jalankan aplikasi menggunakan server bawaan CodeIgniter:

```bash
php spark serve

```

Akses aplikasi di: `http://localhost:8080`

---

## Informasi Akun Admin Default

Gunakan akun berikut untuk masuk ke Dashboard Admin (`/login`):

* **Username**: `admin`
* **Password**: `password`

> **Catatan**: Segera ubah password Anda di menu "Keamanan Akun" pada Dashboard Admin setelah berhasil login.

---

## Detail Kontak Proyek (Alpha Kost)

* 
**Nama Kost**: Alpha Kost 


* 
**Owner**: Pak Raji 


* **Alamat**: Jl. Simongan Jl. Pamularsih Buntu No.41, Semarang Barat 


* 
**WhatsApp**: +62 877-3835-0820 



---