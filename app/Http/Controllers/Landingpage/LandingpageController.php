<?php

namespace App\Http\Controllers\Landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function homeView()
    {
        return view('landingpage.index');
    }

    public function perencanaanKerjaView()
    {
        return view('landingpage.perencana_kerja');
    }

    public function pengukuranKinerjaView()
    {
        return view('landingpage.index');
    }

    public function pelaporanKinerjaView()
    {
        return view('landingpage.index');
    }

    public function evaluasiInternal()
    {
        return view('landingpage.index');
    }
}
