<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UmrohPackage;
use App\Models\HajiPackage;
use App\Models\ManasikVideo;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function umroh()
    {
        $packages = UmrohPackage::where('is_active', true)->latest()->paginate(9);
        return view('packages.umroh.index', compact('packages'));
    }

    public function umrohDetail(UmrohPackage $package)
    {
        return view('packages.umroh.detail', compact('package'));
    }

    public function haji()
    {
        $packages = HajiPackage::where('is_active', true)->latest()->paginate(9);
        return view('packages.haji.index', compact('packages'));
    }

    public function hajiDetail(HajiPackage $package)
    {
        return view('packages.haji.detail', compact('package'));
    }

    public function videos()
    {
        $videos = ManasikVideo::where('is_active', true)->latest()->paginate(12);
        return view('videos.index', compact('videos'));
    }
}
