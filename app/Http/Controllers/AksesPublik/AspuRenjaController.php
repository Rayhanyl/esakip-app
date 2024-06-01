<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuRenjaController extends Controller
{
    public function index()
    {
        return view('akses_publik.perencanaan_kinerja.renja.index');
    }
}
