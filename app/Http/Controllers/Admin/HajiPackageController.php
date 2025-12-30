<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HajiPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HajiPackageController extends Controller
{
    public function index()
    {
        $packages = HajiPackage::latest()->paginate(10);
        return view('admin.haji.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.haji.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:reguler,plus,furoda',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
            'facilities' => 'required|string',
            'quota' => 'nullable|integer|min:0',
            'estimated_departure' => 'nullable|string|max:255',
            'hotel' => 'nullable|string|max:255',
            'airline' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }

        HajiPackage::create($validated);

        return redirect()->route('admin.haji.index')->with('success', 'Paket Haji berhasil ditambahkan.');
    }

    public function show(HajiPackage $haji)
    {
        return view('admin.haji.show', compact('haji'));
    }

    public function edit(HajiPackage $haji)
    {
        return view('admin.haji.edit', ['hajiPackage' => $haji]);
    }

    public function update(Request $request, HajiPackage $haji)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:reguler,plus,furoda',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
            'facilities' => 'required|string',
            'quota' => 'nullable|integer|min:0',
            'estimated_departure' => 'nullable|string|max:255',
            'hotel' => 'nullable|string|max:255',
            'airline' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($haji->image) {
                Storage::disk('public')->delete($haji->image);
            }
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }

        $haji->update($validated);

        return redirect()->route('admin.haji.index')->with('success', 'Paket Haji berhasil diupdate.');
    }

    public function destroy(HajiPackage $haji)
    {
        if ($haji->image) {
            Storage::disk('public')->delete($haji->image);
        }

        $haji->delete();

        return redirect()->route('admin.haji.index')->with('success', 'Paket Haji berhasil dihapus.');
    }
}
