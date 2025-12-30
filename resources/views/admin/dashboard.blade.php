@extends('layouts.admin')

@section('title', 'Dashboard Admin - PT. Anihamid Group')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Paket Umroh -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Paket Umroh</p>
                <p class="text-3xl font-bold text-gray-900">{{ $umrohCount }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('admin.umroh.index') }}" class="text-sm text-green-600 hover:text-green-700 font-medium mt-4 inline-block">
            Kelola Paket →
        </a>
    </div>
    
    <!-- Total Paket Haji -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Paket Haji</p>
                <p class="text-3xl font-bold text-gray-900">{{ $hajiCount }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('admin.haji.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium mt-4 inline-block">
            Kelola Paket →
        </a>
    </div>
    
    <!-- Total Video Manasik -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Video Manasik</p>
                <p class="text-3xl font-bold text-gray-900">{{ $videoCount }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        <a href="{{ route('admin.videos.index') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium mt-4 inline-block">
            Kelola Video →
        </a>
    </div>
    
    <!-- Total Users -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Pengguna</p>
                <p class="text-3xl font-bold text-gray-900">{{ $userCount }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Umroh Packages -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Paket Umroh Terbaru</h3>
        @if($recentUmroh->count() > 0)
            <div class="space-y-4">
                @foreach($recentUmroh as $package)
                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">{{ $package->name }}</h4>
                        <p class="text-sm text-gray-600">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $package->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ $package->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-4">Belum ada paket umroh</p>
        @endif
    </div>
    
    <!-- Recent Haji Packages -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Paket Haji Terbaru</h3>
        @if($recentHaji->count() > 0)
            <div class="space-y-4">
                @foreach($recentHaji as $package)
                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                    <div>
                        <h4 class="font-semibold text-gray-900">{{ $package->name }}</h4>
                        <p class="text-sm text-gray-600">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $package->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                        {{ $package->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-4">Belum ada paket haji</p>
        @endif
    </div>
</div>

<div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-6">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-green-800">Selamat datang di Admin Dashboard</h3>
            <div class="mt-2 text-sm text-green-700">
                <p>Anda dapat mengelola semua konten website PT. Anihamid Group dari sini. Gunakan menu di samping untuk mengakses berbagai fitur pengelolaan.</p>
            </div>
        </div>
    </div>
</div>
@endsection
