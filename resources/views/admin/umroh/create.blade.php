@extends('layouts.admin')

@section('title', 'Tambah Paket Umroh - Admin')
@section('page-title', 'Tambah Paket Umroh')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.umroh.index') }}" class="text-gray-600 hover:text-gray-900 inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar Paket
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-8">
        <form action="{{ route('admin.umroh.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Paket <span class="text-red-500">*</span></label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('name') border-red-500 @enderror" 
                       placeholder="Contoh: Paket Umroh Ekonomis 9 Hari"
                       required>
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" 
                           name="price" 
                           id="price" 
                           value="{{ old('price') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('price') border-red-500 @enderror" 
                           placeholder="25000000"
                           required>
                    @error('price')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Durasi (Hari) <span class="text-red-500">*</span></label>
                    <input type="number" 
                           name="duration" 
                           id="duration" 
                           value="{{ old('duration') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('duration') border-red-500 @enderror" 
                           placeholder="9"
                           required>
                    @error('duration')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="schedule" class="block text-sm font-medium text-gray-700 mb-2">Jadwal Keberangkatan <span class="text-red-500">*</span></label>
                <input type="text" 
                       name="schedule" 
                       id="schedule" 
                       value="{{ old('schedule') }}"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('schedule') border-red-500 @enderror" 
                       placeholder="Contoh: Setiap tanggal 15"
                       required>
                @error('schedule')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" 
                          id="description" 
                          rows="6"
                          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('description') border-red-500 @enderror" 
                          placeholder="Deskripsikan paket umroh ini..."
                          required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="facilities" class="block text-sm font-medium text-gray-700 mb-2">Fasilitas <span class="text-red-500">*</span></label>
                <textarea name="facilities" 
                          id="facilities" 
                          rows="6"
                          class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('facilities') border-red-500 @enderror" 
                          placeholder="- Tiket pesawat PP&#10;- Hotel bintang 4&#10;- Makan 3x sehari&#10;- Visa&#10;- dll"
                          required>{{ old('facilities') }}</textarea>
                @error('facilities')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="hotel" class="block text-sm font-medium text-gray-700 mb-2">Hotel</label>
                    <input type="text" 
                           name="hotel" 
                           id="hotel" 
                           value="{{ old('hotel') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('hotel') border-red-500 @enderror" 
                           placeholder="Contoh: Hotel Bintang 4 dekat Masjidil Haram">
                    @error('hotel')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="airline" class="block text-sm font-medium text-gray-700 mb-2">Maskapai</label>
                    <input type="text" 
                           name="airline" 
                           id="airline" 
                           value="{{ old('airline') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('airline') border-red-500 @enderror" 
                           placeholder="Contoh: Garuda Indonesia">
                    @error('airline')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Paket</label>
                <input type="file" 
                       name="image" 
                       id="image" 
                       accept="image/*"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none @error('image') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, JPEG</p>
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_active" 
                           value="1" 
                           {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <span class="ml-2 text-sm text-gray-700">Aktifkan paket ini</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors">
                    Simpan Paket
                </button>
                <a href="{{ route('admin.umroh.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-8 py-3 rounded-lg transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
