@extends('layouts.app')

@section('title', 'Tentang Kami - PT. Anihamid Group')

@section('content')
<!-- Header -->
<section class="bg-gradient-to-r from-green-600 to-green-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Kami</h1>
        <p class="text-xl text-green-100">Mengenal lebih dekat PT. Anihamid Group</p>
    </div>
</section>

<!-- Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Selamat Datang di PT. Anihamid Group</h2>
            
            <p class="text-gray-700 leading-relaxed mb-6">
                PT. Anihamid Group adalah perusahaan travel umroh dan haji yang telah berpengalaman dalam melayani ribuan jamaah untuk menunaikan ibadah umroh dan haji. Kami berkomitmen untuk memberikan pelayanan terbaik dengan harga yang kompetitif tanpa mengurangi kualitas.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Visi Kami</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Menjadi perusahaan travel umroh dan haji terdepan yang dipercaya oleh masyarakat Indonesia dalam memberikan pelayanan ibadah yang berkualitas, amanah, dan profesional.
            </p>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Misi Kami</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
                <li>Memberikan pelayanan umroh dan haji yang berkualitas dan terpercaya</li>
                <li>Menyediakan paket umroh dan haji dengan harga yang kompetitif</li>
                <li>Memberikan bimbingan manasik yang lengkap dan mudah dipahami</li>
                <li>Memastikan kenyamanan dan keamanan jamaah selama perjalanan ibadah</li>
                <li>Menjalin kerjasama dengan pihak-pihak terkait untuk memberikan layanan terbaik</li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 mt-8">Mengapa Memilih Kami?</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-green-50 p-6 rounded-lg">
                    <h4 class="font-bold text-gray-900 mb-2">Legal & Terpercaya</h4>
                    <p class="text-gray-700 text-sm">Terdaftar resmi di Kementerian Agama dengan izin lengkap</p>
                </div>
                <div class="bg-green-50 p-6 rounded-lg">
                    <h4 class="font-bold text-gray-900 mb-2">Berpengalaman</h4>
                    <p class="text-gray-700 text-sm">Telah melayani ribuan jamaah dengan tingkat kepuasan tinggi</p>
                </div>
                <div class="bg-green-50 p-6 rounded-lg">
                    <h4 class="font-bold text-gray-900 mb-2">Harga Kompetitif</h4>
                    <p class="text-gray-700 text-sm">Paket dengan harga terjangkau tanpa mengurangi kualitas</p>
                </div>
                <div class="bg-green-50 p-6 rounded-lg">
                    <h4 class="font-bold text-gray-900 mb-2">Pembimbing Profesional</h4>
                    <p class="text-gray-700 text-sm">Didampingi ustadz dan pembimbing berpengalaman</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Siap Bergabung dengan Kami?</h2>
        <p class="text-xl text-gray-600 mb-8">
            Hubungi kami sekarang untuk informasi lebih lanjut tentang paket umroh dan haji
        </p>
        <a href="{{ route('contact') }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
            Hubungi Kami
        </a>
    </div>
</section>
@endsection
