# PT. Anihamid Group - Website Umroh, Haji & Manasik Online

Website resmi PT. Anihamid Group untuk layanan Umroh, Haji, dan Manasik Online dengan fitur lengkap untuk admin dan user.

## 🌟 Fitur Utama

### Untuk User (Jamaah)

-   **Halaman Utama (Landing Page)**: Tampilan menarik dengan informasi paket unggulan
-   **Paket Umroh**: Katalog lengkap paket umroh dengan detail harga, durasi, dan fasilitas
-   **Paket Haji**: Katalog lengkap paket haji dengan detail lengkap
-   **Video Manasik Online**: Koleksi video tutorial manasik untuk persiapan ibadah
-   **Integrasi WhatsApp**: Tombol floating dan link langsung ke WhatsApp untuk konsultasi
-   **Authentication**: Sistem login dan registrasi untuk user
-   **Responsive Design**: Tampilan optimal di semua perangkat (desktop, tablet, mobile)

### Untuk Admin

-   **Dashboard Admin**: Overview statistik paket dan pengguna
-   **Kelola Paket Umroh**: CRUD (Create, Read, Update, Delete) paket umroh
-   **Kelola Paket Haji**: CRUD paket haji
-   **Kelola Video Manasik**: CRUD video tutorial manasik
-   **Upload Gambar**: Fitur upload gambar untuk paket
-   **Status Aktif/Nonaktif**: Toggle status paket untuk kontrol publikasi

## 🛠 Teknologi yang Digunakan

-   **Framework**: Laravel 11
-   **Frontend**: Blade Templates, TailwindCSS
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze/Manual Auth
-   **File Storage**: Laravel Storage (Public)

## 📋 Persyaratan Sistem

-   PHP >= 8.2
-   Composer
-   MySQL/MariaDB
-   Node.js & NPM (untuk compile assets)
-   Web Server (Apache/Nginx)

## 🚀 Instalasi

### 1. Clone atau Setup Project

```bash
cd C:\laragon\www\lsv-umroh
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

Copy file `.env.example` menjadi `.env`:

```bash
copy .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
APP_NAME="PT. Anihamid Group"
APP_URL=http://localhost/lsv-umroh/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lsv_umroh
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Compile Assets

```bash
npm run build
# atau untuk development:
npm run dev
```

### 8. Seed Data (Opsional)

Buat admin user default:

```bash
php artisan tinker
```

Kemudian jalankan:

```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@anihamid.com',
    'password' => bcrypt('password123'),
    'role' => 'admin'
]);
```

## 🎯 Cara Menggunakan

### Akses Website

**Frontend (User)**:

```
http://localhost/lsv-umroh/public
```

**Admin Dashboard**:

```
http://localhost/lsv-umroh/public/admin/dashboard
```

Login dengan kredensial admin yang telah dibuat.

### Menu Admin

1. **Dashboard**: Melihat statistik dan overview
2. **Paket Umroh**: Kelola semua paket umroh
3. **Paket Haji**: Kelola semua paket haji
4. **Video Manasik**: Kelola video tutorial
5. **Lihat Website**: Preview tampilan user

### Menambah Paket Baru

1. Login sebagai admin
2. Klik menu "Paket Umroh" atau "Paket Haji"
3. Klik tombol "Tambah Paket Baru"
4. Isi form dengan lengkap:
    - Nama Paket
    - Harga
    - Durasi (hari)
    - Jadwal Keberangkatan
    - Deskripsi
    - Fasilitas
    - Hotel (opsional)
    - Maskapai (opsional)
    - Upload Gambar (opsional)
    - Centang "Aktifkan paket ini"
5. Klik "Simpan Paket"

### Menambah Video Manasik

1. Login sebagai admin
2. Klik menu "Video Manasik"
3. Klik "Tambah Video Baru"
4. Isi form:
    - Judul Video
    - URL Video YouTube
    - Deskripsi
    - Durasi (opsional)
5. Klik "Simpan Video"

## 📱 Fitur WhatsApp Integration

Website ini terintegrasi dengan WhatsApp untuk memudahkan komunikasi dengan calon jamaah:

-   **Floating Button**: Tombol WhatsApp di pojok kanan bawah setiap halaman
-   **Link Booking**: Tombol booking di detail paket langsung terhubung ke WhatsApp
-   **Pre-filled Message**: Pesan otomatis berisi informasi paket yang dipilih

**Cara Konfigurasi**:

Edit nomor WhatsApp di file:

-   `resources/views/layouts/app.blade.php` (line 201)
-   `resources/views/home.blade.php` (line 258)
-   `resources/views/packages/umroh/detail.blade.php` (line 141, 147)
-   Dan file terkait lainnya

Ganti `6281234567890` dengan nomor WhatsApp bisnis Anda (format internasional tanpa +).

## 🎨 Kustomisasi

### Mengubah Warna Tema

Edit file `tailwind.config.js` untuk mengubah skema warna:

```javascript
colors: {
    green: {
        // Sesuaikan dengan warna brand Anda
    }
}
```

### Mengubah Logo

Ganti logo di `resources/views/layouts/app.blade.php` line 31-40 dengan logo perusahaan Anda.

### Mengubah Informasi Kontak

Edit informasi kontak di:

-   Footer: `resources/views/layouts/app.blade.php`
-   Halaman Kontak: `resources/views/contact.blade.php`

## 📁 Struktur Folder Penting

```
lsv-umroh/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin controllers
│   │   ├── HomeController.php
│   │   └── PackageController.php
│   └── Models/             # Eloquent models
├── database/
│   └── migrations/         # Database migrations
├── public/
│   └── storage/           # Public storage link (untuk gambar)
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── admin/         # Admin views
│       │   ├── dashboard.blade.php
│       │   ├── umroh/    # CRUD Umroh
│       │   ├── haji/     # CRUD Haji
│       │   └── videos/   # CRUD Videos
│       ├── auth/         # Login/Register
│       ├── layouts/      # Layout templates
│       ├── packages/     # Package views
│       └── home.blade.php
└── routes/
    └── web.php           # Route definitions
```

## 🔐 Role & Permission

### User Roles

-   **admin**: Akses penuh ke admin panel
-   **user**: Akses ke website frontend saja

### Middleware

-   `auth`: Harus login
-   `admin`: Harus login sebagai admin

## 📝 Database Schema

### Users Table

-   id
-   name
-   email
-   password
-   role (enum: 'admin', 'user')
-   timestamps

### Umroh_Packages Table

-   id
-   name
-   price (decimal)
-   duration (integer, hari)
-   description (text)
-   facilities (text)
-   schedule
-   hotel
-   airline
-   image
-   is_active (boolean)
-   timestamps

### Haji_Packages Table

(Sama dengan Umroh_Packages)

### Manasik_Videos Table

-   id
-   title
-   description
-   video_url
-   duration
-   is_active (boolean)
-   timestamps

## 🐛 Troubleshooting

### Error 500 - Internal Server Error

-   Pastikan file `.env` sudah dikonfigurasi dengan benar
-   Jalankan `php artisan config:clear` dan `php artisan cache:clear`
-   Cek permission folder `storage/` dan `bootstrap/cache/`

### Gambar Tidak Muncul

-   Pastikan sudah menjalankan `php artisan storage:link`
-   Cek permission folder `storage/app/public/`
-   Pastikan path gambar sudah benar

### CSS/JS Tidak Load

-   Jalankan `npm run build`
-   Clear browser cache
-   Cek file `vite.config.js` sudah benar

### Migration Error

-   Cek koneksi database di `.env`
-   Pastikan database sudah dibuat
-   Jalankan `php artisan migrate:fresh` untuk reset database

## 📞 Support

Untuk bantuan lebih lanjut, hubungi:

-   Email: info@anihamid.com
-   WhatsApp: +62 812-3456-7890
-   Website: http://localhost/lsv-umroh/public

## 📄 License

Copyright © 2025 PT. Anihamid Group. All rights reserved.

## 🎯 TODO / Future Enhancements

-   [ ] Sistem booking online dengan payment gateway
-   [ ] Email notification untuk booking
-   [ ] User dashboard untuk melihat history booking
-   [ ] Review dan rating sistem
-   [ ] Blog/Artikel section
-   [ ] Multi-language support
-   [ ] Live chat feature
-   [ ] Mobile app (React Native)
-   [ ] PDF generator untuk invoice
-   [ ] Export data ke Excel

---

**Dibuat dengan ❤️ untuk PT. Anihamid Group**
