<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UmrohPackage;
use App\Models\HajiPackage;
use App\Models\ManasikVideo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $umrohCount = UmrohPackage::count();
        $hajiCount = HajiPackage::count();
        $videoCount = ManasikVideo::count();
        $userCount = \App\Models\User::count();
        
        $recentUmroh = UmrohPackage::latest()->take(5)->get();
        $recentHaji = HajiPackage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'umrohCount',
            'hajiCount', 
            'videoCount',
            'userCount',
            'recentUmroh',
            'recentHaji'
        ));
    }
}
