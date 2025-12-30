<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class WebsiteContentController extends Controller
{
    public function index()
    {
        $contents = WebsiteContent::all();
        return view('admin.content.index', compact('contents'));
    }

    public function edit(WebsiteContent $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request, WebsiteContent $content)
    {
        $validated = $request->validate([
            'value' => 'required|string',
        ]);

        $content->update($validated);

        return redirect()->route('admin.content.index')->with('success', 'Konten berhasil diupdate.');
    }
}
