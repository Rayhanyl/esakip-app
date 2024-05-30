<?php

namespace App\Http\Controllers\Landingpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerangkatDaerahPengukuranKinerja;
use App\Models\PerencanaanKinerjaStrategicTarget;

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

    public function pengukuranKinerjaView(Request $request)
    {
        $data = PerangkatDaerahPengukuranKinerja::get();
        return view('landingpage.pengukuran_kinerja.index', compact('data'));
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
