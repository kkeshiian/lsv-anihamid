@extends('layouts.app')

@section('title', 'Video Manasik - PT. Anihamid Group')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-green-600 to-green-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Video Manasik Online</h1>
        <p class="text-xl text-green-100">Pelajari tata cara ibadah umroh dan haji dengan panduan video lengkap</p>
    </div>
</section>

<!-- Videos Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($videos->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($videos as $video)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <!-- Video Thumbnail -->
                    <div class="relative aspect-video bg-gray-900">
                        @php
                            // Extract YouTube video ID from URL
                            $videoId = '';
                            if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $video->video_url, $id)) {
                                $videoId = $id[1];
                            } elseif (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $video->video_url, $id)) {
                                $videoId = $id[1];
                            } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $video->video_url, $id)) {
                                $videoId = $id[1];
                            }
                        @endphp
                        
                        @if($videoId)
                            <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg" 
                                 alt="{{ $video->title }}" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 hover:bg-opacity-50 transition-all">
                                <a href="{{ $video->video_url }}" target="_blank" class="w-16 h-16 bg-green-600 hover:bg-green-700 rounded-full flex items-center justify-center transition-colors">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </a>
                            </div>
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-20 h-20 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Video Info -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $video->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $video->description }}</p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $video->duration ?? 'N/A' }}
                            </span>
                        </div>
                        
                        <a href="{{ $video->video_url }}" 
                           target="_blank"
                           class="w-full bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold text-center block transition-colors">
                            Tonton Video
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $videos->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Video Tersedia</h3>
                <p class="text-gray-600">Video panduan manasik akan segera hadir. Silakan hubungi kami untuk informasi lebih lanjut.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Butuh Bimbingan Manasik Langsung?</h2>
        <p class="text-xl text-gray-600 mb-8">
            Kami menyediakan kelas manasik offline untuk persiapan yang lebih maksimal
        </p>
        <a href="https://wa.me/6281234567890?text=Assalamualaikum,%20saya%20ingin%20bertanya%20tentang%20kelas%20manasik" 
           target="_blank"
           class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
            Hubungi via WhatsApp
        </a>
    </div>
</section>
@endsection
