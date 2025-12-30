@extends('layouts.app')

@section('title', $package->name . ' - PT. Anihamid Group')

@section('content')
<!-- Package Header -->
<section class="bg-gradient-to-r from-green-600 to-green-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:text-green-200">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('packages.umroh') }}" class="hover:text-green-200">Paket Umroh</a>
            <span class="mx-2">/</span>
            <span class="text-green-200">{{ $package->name }}</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold">{{ $package->name }}</h1>
    </div>
</section>

<!-- Package Details -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Image -->
                @if($package->image)
                    <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}" class="w-full h-96 object-cover rounded-xl mb-8">
                @else
                    <div class="w-full h-96 bg-gradient-to-r from-green-400 to-green-600 flex items-center justify-center rounded-xl mb-8">
                        <svg class="w-32 h-32 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                @endif
                
                <!-- Description -->
                <div class="bg-white rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi Paket</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $package->description }}</p>
                </div>
                
                <!-- Facilities -->
                <div class="bg-white rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Fasilitas</h2>
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $package->facilities }}</div>
                </div>
                
                <!-- Package Info -->
                <div class="bg-white rounded-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Paket</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Durasi</p>
                                <p class="font-semibold text-gray-900">{{ $package->duration }} Hari</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Jadwal Keberangkatan</p>
                                <p class="font-semibold text-gray-900">{{ $package->schedule }}</p>
                            </div>
                        </div>
                        
                        @if($package->hotel)
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Hotel</p>
                                <p class="font-semibold text-gray-900">{{ $package->hotel }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if($package->airline)
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Maskapai</p>
                                <p class="font-semibold text-gray-900">{{ $package->airline }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Price Card -->
                <div class="bg-white rounded-xl p-8 shadow-lg sticky top-24 mb-8">
                    <div class="mb-6">
                        <p class="text-gray-600 mb-2">Harga Paket</p>
                        <p class="text-4xl font-bold text-green-600">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500 mt-1">per orang</p>
                    </div>
                    
                    <a href="https://wa.me/6281234567890?text=Assalamualaikum,%20saya%20ingin%20booking%20paket%20{{ urlencode($package->name) }}" 
                       target="_blank"
                       class="w-full bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-lg font-semibold text-center block transition-colors mb-4">
                        Booking Sekarang
                    </a>
                    
                    <a href="https://wa.me/6281234567890?text=Assalamualaikum,%20saya%20ingin%20bertanya%20tentang%20{{ urlencode($package->name) }}" 
                       target="_blank"
                       class="w-full bg-white hover:bg-gray-50 text-green-600 border-2 border-green-600 px-6 py-4 rounded-lg font-semibold text-center block transition-colors">
                        Tanya via WhatsApp
                    </a>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-600 text-center">
                            <svg class="w-5 h-5 inline text-green-600 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Terdaftar resmi di Kemenag
                        </p>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="bg-green-50 rounded-xl p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Butuh Bantuan?</h3>
                    <div class="space-y-3 text-sm">
                        <p class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            (021) 1234-5678
                        </p>
                        <p class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            info@anihamid.com
                        </p>
                        <p class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            +62 812-3456-7890
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
