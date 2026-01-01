<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // --- BAGIAN 1: VALIDASI ---
        // Di sini TIDAK BOLEH ada 'phone' => null.
        // Kalau tidak mau divalidasi, barisnya harus HILANG TOTAL.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        try {
            // --- BAGIAN 2: SIMPAN KE DATABASE ---
            // Nah, di sini BARU kita masukkan null untuk kolom yang kosong.
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => null, // <--- DISINI 'phone' => null BOLEH (dan Harus)
                'password' => Hash::make($validated['password']),
                'is_admin' => false,
            ]);

            Auth::login($user);

            return redirect()->route('home')
                ->with('success', 'Pendaftaran berhasil!');

        } catch (\Exception $e) {
            Log::error('REGISTER ERROR: ' . $e->getMessage());
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}