<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuPerjanjianKinerjaController extends Controller
{
    public function index()
    {
        return view('akses_publik.perencanaan_kinerja.perjanjian_kinerja.index');
    }
}
