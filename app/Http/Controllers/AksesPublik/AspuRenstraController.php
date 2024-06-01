<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuRenstraController extends Controller
{
    public function index()
    {
        return view('akses_publik.perencanaan_kinerja.renstra.index');
    }
}
