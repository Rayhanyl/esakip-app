<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuPerangkatDaerahDetailController extends Controller
{
    public function index()
    {
        return view('akses_publik.pengukuran_kinerja.perangkat_daerah_detail.index');
    }
}
