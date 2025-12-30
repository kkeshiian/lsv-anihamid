<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WebsiteContent;
use App\Models\UmrohPackage;
use App\Models\HajiPackage;
use App\Models\ManasikVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@anihamid.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Website Contents
        $contents = [
            ['key' => 'hero_title', 'value' => 'Wujudkan Impian Ibadah Umroh & Haji', 'type' => 'text'],
            ['key' => 'hero_subtitle', 'value' => 'Bersama PT. Anihamid Group Wisata - Travel Umroh & Haji Terpercaya', 'type' => 'text'],
            ['key' => 'company_profile', 'value' => 'PT. Anihamid Group Wisata adalah penyelenggara perjalanan ibadah umroh dan haji yang telah berpengalaman lebih dari 15 tahun. Kami berkomitmen memberikan pelayanan terbaik dengan harga terjangkau.', 'type' => 'textarea'],
            ['key' => 'company_vision', 'value' => 'Menjadi penyelenggara perjalanan ibadah terpercaya dan terbaik di Indonesia', 'type' => 'textarea'],
            ['key' => 'company_mission', 'value' => '1. Memberikan pelayanan terbaik kepada jamaah\n2. Menyediakan paket umroh dan haji berkualitas\n3. Membantu mewujudkan impian ibadah umat muslim', 'type' => 'textarea'],
            ['key' => 'contact_phone', 'value' => '+62 812-3456-7890', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@anihamid.com', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'Jakarta, Indonesia', 'type' => 'text'],
        ];

        foreach ($contents as $content) {
            WebsiteContent::create($content);
        }

        // Umroh Packages - Regular
        UmrohPackage::create([
            'name' => 'Umroh Reguler 9 Hari',
            'price' => 23500000,
            'duration' => 9,
            'description' => 'Paket umroh reguler dengan fasilitas standar yang nyaman dan terjangkau. Cocok untuk jamaah yang ingin beribadah dengan budget hemat namun tetap berkualitas.',
            'facilities' => "- Hotel bintang 3 dekat Masjidil Haram (walking distance 10 menit)\n- Hotel bintang 3 dekat Masjid Nabawi\n- Makan 3x sehari (buffet + katering Indonesia)\n- Transportasi AC full\n- Perlengkapan umroh (tas, koper, mukena, dll)\n- Pembimbing berpengalaman\n- Ziarah (Jabal Rahmah, Jabal Tsur, dll)\n- Manasik sebelum keberangkatan\n- City tour Madinah",
            'schedule' => '15 Februari 2025',
            'hotel' => 'Elaf Al Mashaer Hotel / Setaraf',
            'airline' => 'Saudia Airlines',
            'is_active' => true,
        ]);

        UmrohPackage::create([
            'name' => 'Umroh Reguler 12 Hari',
            'price' => 27500000,
            'duration' => 12,
            'description' => 'Paket umroh reguler 12 hari dengan waktu lebih panjang untuk beribadah dan ziarah lebih banyak tempat bersejarah.',
            'facilities' => "- Hotel bintang 3 dekat Masjidil Haram\n- Hotel bintang 3 dekat Masjid Nabawi\n- Makan 3x sehari\n- Transportasi AC full\n- Perlengkapan umroh lengkap\n- Pembimbing berpengalaman\n- Ziarah lengkap (Jabal Rahmah, Jabal Tsur, Jabal Uhud, dll)\n- Manasik & handling bandara\n- City tour Makkah & Madinah",
            'schedule' => '25 Maret 2025',
            'hotel' => 'Dar Al Eiman Grand Hotel / Setaraf',
            'airline' => 'Saudia Airlines',
            'is_active' => true,
        ]);

        // Umroh Packages - Premium
        UmrohPackage::create([
            'name' => 'Umroh Premium 9 Hari',
            'price' => 32500000,
            'duration' => 9,
            'description' => 'Paket umroh premium dengan hotel bintang 4 dekat Masjidil Haram. Fasilitas lebih nyaman dengan kamar yang lebih luas dan view yang indah.',
            'facilities' => "- Hotel bintang 4 dekat Masjidil Haram (walking distance 5 menit)\n- Hotel bintang 4 dekat Masjid Nabawi\n- Makan 3x sehari (buffet internasional)\n- Transportasi VIP\n- Perlengkapan umroh premium (tas eksklusif, koper, sajadah, dll)\n- Pembimbing berpengalaman & muthawif resmi\n- Ziarah lengkap dengan guide profesional\n- Manasik intensif\n- City tour & shopping\n- Air zam-zam 5 liter",
            'schedule' => '5 April 2025',
            'hotel' => 'Makkah Hotel / Anjum Hotel Makkah',
            'airline' => 'Garuda Indonesia',
            'is_active' => true,
        ]);

        UmrohPackage::create([
            'name' => 'Umroh Premium Plus 12 Hari',
            'price' => 38500000,
            'duration' => 12,
            'description' => 'Paket umroh premium plus dengan hotel bintang 5 view Ka\'bah. Nikmati kenyamanan maksimal dengan fasilitas VIP dan pelayanan eksklusif.',
            'facilities' => "- Hotel bintang 5 view Ka'bah (Fairmont / Hilton / Conrad)\n- Hotel bintang 5 dekat Masjid Nabawi\n- Makan 3x sehari (buffet 5 star + room service)\n- Transportasi VIP dengan WiFi\n- Perlengkapan umroh eksklusif premium\n- Pembimbing & muthawif berpengalaman\n- Ziarah lengkap + private tour\n- Manasik intensif di hotel bintang 5\n- City tour & shopping eksklusif\n- Air zam-zam 10 liter\n- Laundry service\n- Welcome drink & snack di hotel",
            'schedule' => '10 Mei 2025',
            'hotel' => 'Hilton Makkah Convention / Fairmont Makkah',
            'airline' => 'Garuda Indonesia',
            'is_active' => true,
        ]);

        // Haji Packages - Reguler
        HajiPackage::create([
            'name' => 'Haji Reguler 2026',
            'type' => 'reguler',
            'price' => 45900000,
            'duration' => 40,
            'description' => 'Paket haji reguler sesuai standar Kementerian Agama RI. Fasilitas lengkap dengan bimbingan intensif untuk melaksanakan rukun Islam kelima dengan khusyuk.',
            'facilities' => "- Hotel di Makkah (walking distance ke Masjidil Haram)\n- Hotel di Madinah (dekat Masjid Nabawi)\n- Tenda Arafah & Mina sesuai kuota pemerintah\n- Makan 3x sehari (katering Indonesia)\n- Transportasi AC full\n- Perlengkapan haji lengkap\n- Pembimbing ibadah bersertifikat\n- Handling bandara Jeddah\n- Manasik haji di tanah air\n- Air zam-zam 5 liter\n- Asuransi perjalanan",
            'quota' => 45,
            'estimated_departure' => 'Juni 2026',
            'hotel' => 'Hotel Haji Sesuai Kuota Kemenag',
            'airline' => 'Saudia Airlines / Garuda Indonesia',
            'is_active' => true,
        ]);

        // Haji Packages - ONH Plus
        HajiPackage::create([
            'name' => 'Haji ONH Plus 2026',
            'type' => 'plus',
            'price' => 68500000,
            'duration' => 40,
            'description' => 'Paket haji ONH Plus dengan fasilitas hotel lebih dekat ke Masjidil Haram dan Masjid Nabawi. Kenyamanan lebih untuk ibadah yang lebih khusyuk.',
            'facilities' => "- Hotel bintang 4 dekat Masjidil Haram (walking distance 5-7 menit)\n- Hotel bintang 4 dekat Masjid Nabawi\n- Tenda Arafah & Mina kategori plus\n- Makan 3x sehari (buffet + katering Indonesia premium)\n- Transportasi VIP\n- Perlengkapan haji premium\n- Pembimbing ibadah bersertifikat & muthawif\n- Handling VIP bandara\n- Manasik haji intensif\n- City tour Makkah & Madinah\n- Air zam-zam 10 liter\n- Asuransi perjalanan plus kesehatan",
            'quota' => 25,
            'estimated_departure' => 'Juni 2026',
            'hotel' => 'Dar Al Taqwa / Makkah Hotel',
            'airline' => 'Garuda Indonesia',
            'is_active' => true,
        ]);

        // Haji Packages - Furoda
        HajiPackage::create([
            'name' => 'Haji Furoda 2026',
            'type' => 'furoda',
            'price' => 95000000,
            'duration' => 40,
            'description' => 'Paket haji Furoda (First Class) dengan fasilitas terbaik dan pelayanan VIP. Hotel bintang 5 view Ka\'bah dengan jarak terdekat ke Masjidil Haram untuk kenyamanan maksimal.',
            'facilities' => "- Hotel bintang 5 view Ka'bah (Fairmont / Hilton / Conrad)\n- Hotel bintang 5 view Masjid Nabawi\n- Tenda Arafah & Mina VIP (AC, tempat tidur empuk)\n- Makan 3x sehari (buffet 5 star + room service)\n- Transportasi VIP eksklusif dengan WiFi\n- Perlengkapan haji eksklusif premium\n- Pembimbing & muthawif berpengalaman pribadi\n- Handling VVIP bandara dengan fast track\n- Manasik haji intensif eksklusif\n- City tour & shopping VIP\n- Air zam-zam 20 liter\n- Laundry service\n- Medical check up & dokter on call\n- Asuransi perjalanan & kesehatan premium\n- Welcome package premium",
            'quota' => 15,
            'estimated_departure' => 'Juni 2026',
            'hotel' => 'Hilton Convention / Fairmont / Conrad Makkah',
            'airline' => 'Garuda Indonesia (Business Class)',
            'is_active' => true,
        ]);

        // Manasik Videos
        ManasikVideo::create([
            'title' => 'Tata Cara Umroh Lengkap - Dari Ihram Sampai Selesai',
            'description' => 'Panduan lengkap tata cara melaksanakan ibadah umroh mulai dari niat ihram, thawaf, sa\'i, tahalul hingga selesai. Dijelaskan dengan detail dan mudah dipahami.',
            'video_url' => 'https://youtu.be/oW8RWjijq4M?si=AWD6vwhYAGnTGTZy',
            'duration' => '15:30',
            'is_active' => true,
        ]);

        ManasikVideo::create([
            'title' => 'Manasik Haji Lengkap Untuk Pemula',
            'description' => 'Tutorial manasik haji yang mudah dipahami untuk calon jamaah haji. Mulai dari persiapan, wukuf di Arafah, mabit di Muzdalifah, melontar jumrah, hingga tawaf wada.',
            'video_url' => 'https://youtu.be/oW8RWjijq4M?si=AWD6vwhYAGnTGTZy',
            'duration' => '25:45',
            'is_active' => true,
        ]);

        ManasikVideo::create([
            'title' => 'Doa-Doa Penting Saat Umroh dan Haji',
            'description' => 'Kumpulan doa-doa penting yang perlu dihafalkan saat melaksanakan ibadah umroh dan haji, lengkap dengan arti dan tata caranya.',
            'video_url' => 'https://youtu.be/oW8RWjijq4M?si=AWD6vwhYAGnTGTZy',
            'duration' => '12:20',
            'is_active' => true,
        ]);

        ManasikVideo::create([
            'title' => 'Tips dan Persiapan Sebelum Berangkat Umroh',
            'description' => 'Tips lengkap persiapan sebelum berangkat umroh, mulai dari dokumen, kesehatan, perlengkapan yang harus dibawa, hingga mental dan spiritual.',
            'video_url' => 'https://youtu.be/oW8RWjijq4M?si=AWD6vwhYAGnTGTZy',
            'duration' => '18:15',
            'is_active' => true,
        ]);

        ManasikVideo::create([
            'title' => 'Kesalahan Umum Yang Harus Dihindari Saat Haji',
            'description' => 'Penjelasan tentang kesalahan-kesalahan umum yang sering dilakukan jamaah haji dan bagaimana cara menghindarinya agar ibadah menjadi lebih sempurna.',
            'video_url' => 'https://youtu.be/oW8RWjijq4M?si=AWD6vwhYAGnTGTZy',
            'duration' => '20:10',
            'is_active' => true,
        ]);
    }
}
