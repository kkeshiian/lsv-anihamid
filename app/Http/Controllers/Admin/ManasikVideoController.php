<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManasikVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManasikVideoController extends Controller
{
    public function index()
    {
        $videos = ManasikVideo::latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('videos', 'public');
        }

        ManasikVideo::create($validated);

        return redirect()->route('admin.videos.index')->with('success', 'Video Manasik berhasil ditambahkan.');
    }

    public function show(ManasikVideo $video)
    {
        return view('admin.videos.show', compact('video'));
    }

    public function edit(ManasikVideo $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, ManasikVideo $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('videos', 'public');
        }

        $video->update($validated);

        return redirect()->route('admin.videos.index')->with('success', 'Video Manasik berhasil diupdate.');
    }

    public function destroy(ManasikVideo $video)
    {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }

        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video Manasik berhasil dihapus.');
    }
}
