@extends('layouts.admin')

@section('title', 'Edit Video Manasik - Admin')
@section('page-title', 'Edit Video Manasik')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.videos.index') }}" class="text-gray-600 hover:text-gray-900 inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar Video
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-8">
        <!-- Video Preview -->
        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Preview Video</h3>
            @php
                $videoId = null;
                if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $video->video_url, $matches)) {
                    $videoId = $matches[1];
                } elseif (preg_match('/youtu\.be\/([^?]+)/', $video->video_url, $matches)) {
                    $videoId = $matches[1];
                }
            @endphp
            @if($videoId)
                <div class="aspect-video bg-black rounded-lg overflow-hidden">
                    <iframe 
                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                        class="w-full h-full"
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
            @else
                <div class="aspect-video bg-gray-200 rounded-lg flex items-center justify-center">
                    <p class="text-gray-500">Video preview tidak tersedia</p>
                </div>
            @endif
        </div>

        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Video <span class="text-red-500">*</span></label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title', $video->title) }}"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('title') border-red-500 @enderror" 
                       required>
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">URL Video YouTube <span class="text-red-500">*</span></label>
                <input type="url" 
                       name="video_url" 
                       id="video_url" 
                       value="{{ old('video_url', $video->video_url) }}"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('video_url') border-red-500 @enderror" 
                       required>
                <p class="mt-1 text-sm text-gray-500">Masukkan URL video YouTube lengkap</p>
                @error('video_url')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Durasi Video <span class="text-red-500">*</span></label>
                <input type="text" 
                       name="duration" 
                       id="duration" 
                       value="{{ old('duration', $video->duration) }}"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('duration') border-red-500 @enderror" 
                       required>
                <p class="mt-1 text-sm text-gray-500">Format: MM:SS atau teks bebas (contoh: "10:30" atau "10 menit")</p>
                @error('duration')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" 
                          id="description" 
                          rows="6"
                          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('description') border-red-500 @enderror" 
                          required>{{ old('description', $video->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_active" 
                           value="1" 
                           {{ old('is_active', $video->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="ml-2 text-sm text-gray-700">Aktifkan video ini</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors">
                    Update Video
                </button>
                <a href="{{ route('admin.videos.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-8 py-3 rounded-lg transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Preview video YouTube saat URL diubah
    document.getElementById('video_url').addEventListener('blur', function() {
        const url = this.value;
        const videoId = extractYouTubeId(url);
        
        if (videoId) {
            console.log('YouTube Video ID:', videoId);
            // Bisa tambahkan update preview di sini jika diperlukan
        }
    });

    function extractYouTubeId(url) {
        const regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[7].length == 11) ? match[7] : null;
    }
</script>
@endpush
@endsection
