<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UmrohPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmrohPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = UmrohPackage::latest()->paginate(10);
        return view('admin.umroh.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.umroh.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
            'facilities' => 'required|string',
            'schedule' => 'required|string|max:255',
            'hotel' => 'nullable|string|max:255',
            'airline' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }

        UmrohPackage::create($validated);

        return redirect()->route('admin.umroh.index')->with('success', 'Paket Umroh berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UmrohPackage $umroh)
    {
        return view('admin.umroh.show', compact('umroh'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UmrohPackage $umroh)
    {
        return view('admin.umroh.edit', ['umrohPackage' => $umroh]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UmrohPackage $umroh)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
            'facilities' => 'required|string',
            'schedule' => 'required|string|max:255',
            'hotel' => 'nullable|string|max:255',
            'airline' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($umroh->image) {
                Storage::disk('public')->delete($umroh->image);
            }
            $validated['image'] = $request->file('image')->store('packages', 'public');
        }

        $umroh->update($validated);

        return redirect()->route('admin.umroh.index')->with('success', 'Paket Umroh berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UmrohPackage $umroh)
    {
        if ($umroh->image) {
            Storage::disk('public')->delete($umroh->image);
        }

        $umroh->delete();

        return redirect()->route('admin.umroh.index')->with('success', 'Paket Umroh berhasil dihapus.');
    }
}
