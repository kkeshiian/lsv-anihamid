<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UmrohPackage;
use App\Models\HajiPackage;
use App\Models\ManasikVideo;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredUmroh = UmrohPackage::where('is_active', true)->take(3)->get();
        $featuredHaji = HajiPackage::where('is_active', true)->take(3)->get();
        $contents = WebsiteContent::pluck('value', 'key');

        return view('home', compact('featuredUmroh', 'featuredHaji', 'contents'));
    }

    public function about()
    {
        $contents = WebsiteContent::pluck('value', 'key');
        return view('about', compact('contents'));
    }

    public function contact()
    {
        $contents = WebsiteContent::pluck('value', 'key');
        return view('contact', compact('contents'));
    }
}
