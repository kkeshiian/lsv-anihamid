# PT. Anihamid Group Wisata - Travel Umroh & Haji Website

Website resmi PT. Anihamid Group Wisata untuk layanan Travel Umroh & Haji yang profesional dan modern.

## 🎯 Fitur Utama

### User (Pengunjung)

-   **Landing Page** dengan hero section dan highlight paket
-   **Paket Umroh** - Daftar dan detail paket umroh
-   **Paket Haji** - Paket Haji Reguler dan Plus
-   **Video Manasik Online** - Tutorial ibadah umroh & haji
-   **Tentang Kami** - Profil, visi, misi, dan legalitas perusahaan
-   **Kontak** - Informasi kontak lengkap dengan WhatsApp floating button

### Admin Panel

-   **Dashboard** dengan statistik
-   **Manajemen Paket Umroh** (CRUD)
-   **Manajemen Paket Haji** (CRUD)
-   **Manajemen Video Manasik** (CRUD)
-   **Manajemen Konten Website** (Edit)

## 🛠️ Teknologi

-   **Backend:** Laravel 11.x
-   **Frontend:** Tailwind CSS
-   **Database:** MySQL
-   **Authentication:** Laravel Auth dengan role (Admin & User)

## 🎨 Design Theme

-   **Gold:** `#C9A24D` - Aksen utama
-   **Dark Brown:** `#3E2C1C` - Header & footer
-   **Cream:** `#F9F6F1` - Background
-   **Elegant Black:** `#1E1E1E` - Teks

## 📦 Instalasi

### 1. Clone Repository

```bash
cd c:\laragon\www
git clone [repository-url] lsv-umroh
cd lsv-umroh
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lsv_umroh
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Buat Database

Buat database baru dengan nama `lsv_umroh` di MySQL

### 6. Migrate & Seed Database

```bash
php artisan migrate:fresh --seed
```

### 7. Storage Link

```bash
php artisan storage:link
```

### 8. Compile Assets

```bash
npm run dev
# atau untuk production
npm run build
```

### 9. Jalankan Server

```bash
php artisan serve
```

Website akan berjalan di: `http://localhost:8000`

## 🔐 Default Login

### Admin

-   **Email:** admin@anihamid.com
-   **Password:** password

### User

-   **Email:** user@example.com
-   **Password:** password

## 📂 Struktur Project

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   ├── UmrohPackageController.php
│   │   │   ├── HajiPackageController.php
│   │   │   ├── ManasikVideoController.php
│   │   │   └── WebsiteContentController.php
│   │   ├── HomeController.php
│   │   └── PackageController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── User.php
│   ├── UmrohPackage.php
│   ├── HajiPackage.php
│   ├── ManasikVideo.php
│   └── WebsiteContent.php

database/
├── migrations/
│   ├── 2025_12_28_130951_add_role_to_users_table.php
│   ├── 2025_12_28_131001_create_umroh_packages_table.php
│   ├── 2025_12_28_131045_create_haji_packages_table.php
│   ├── 2025_12_28_131053_create_manasik_videos_table.php
│   └── 2025_12_28_131056_create_website_contents_table.php
└── seeders/
    └── DatabaseSeeder.php

resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php
│   │   └── admin.blade.php
│   ├── admin/
│   │   ├── dashboard.blade.php
│   │   ├── umroh/
│   │   ├── haji/
│   │   ├── videos/
│   │   └── content/
│   ├── packages/
│   ├── videos/
│   ├── home.blade.php
│   ├── about.blade.php
│   └── contact.blade.php

routes/
└── web.php
```

## 🚀 Routes

### Public Routes

-   `/` - Homepage
-   `/paket-umroh` - Daftar paket umroh
-   `/paket-umroh/{id}` - Detail paket umroh
-   `/paket-haji` - Daftar paket haji
-   `/paket-haji/{id}` - Detail paket haji
-   `/video-manasik` - Video manasik
-   `/tentang-kami` - Tentang perusahaan
-   `/kontak` - Kontak

### Admin Routes (Protected)

-   `/admin/dashboard` - Dashboard admin
-   `/admin/umroh` - Manajemen paket umroh
-   `/admin/haji` - Manajemen paket haji
-   `/admin/videos` - Manajemen video manasik
-   `/admin/content` - Manajemen konten website

## 📝 Model Fields

### UmrohPackage

-   name, price, duration, description, facilities, schedule, hotel, airline, image, is_active

### HajiPackage

-   name, type (reguler/plus), price, duration, description, facilities, quota, estimated_departure, hotel, airline, image, is_active

### ManasikVideo

-   title, description, video_url, thumbnail, category, is_active

### WebsiteContent

-   key, value, type (text/textarea/image)

## 🎨 Customization

### Mengubah Warna Tema

Edit `tailwind.config.js`:

```javascript
colors: {
  gold: {
    DEFAULT: '#C9A24D',
    // ...
  },
  // ...
}
```

### Mengubah Konten Website

Login sebagai admin → Menu "Konten Website" → Edit konten yang diinginkan

## 📱 Fitur Tambahan

### WhatsApp Floating Button

Button WhatsApp akan muncul di pojok kanan bawah setiap halaman untuk memudahkan kontak dengan jamaah.

### Responsive Design

Website sudah responsive dan mobile-friendly.

## 🔧 Development

### Menjalankan Development Server

```bash
# Terminal 1 - Laravel
php artisan serve

# Terminal 2 - Vite (Hot reload)
npm run dev
```

### Build untuk Production

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📄 License

Private - PT. Anihamid Group Wisata

## 👨‍💻 Support

Untuk bantuan teknis, hubungi tim developer.

---

**PT. Anihamid Group Wisata**
Travel Umroh & Haji Terpercaya
