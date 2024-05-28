<?php

namespace App\Http\Controllers\PemerintahKabupaten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemerintahKabupatenController extends Controller
{
    public function index(){
        return view('pemkab.index');
    }

    public function pengukuranKinerja(){
        return view('pemkab.pengukuran_kinerja');
    }

    public function perencanaanKinerja(){
        return view('pemkab.perencanaan_kinerja.sasaran_strategis');
    }

    public function pelaporanKinerja(){
        return view('pemkab.pelaporan_kinerja');
    }
}
