<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuRencanaAksiController extends Controller
{
    public function index()
    {
        return view('akses_publik.perencanaan_kinerja.rencana_aksi.index');
    }
}
