<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuPelaporanKinerjaController extends Controller
{
    public function index(){
        return view('akses_publik.pelaporan_kinerja.index');
    }
}
