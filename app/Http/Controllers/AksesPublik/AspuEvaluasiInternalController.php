<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuEvaluasiInternalController extends Controller
{
    public function index()
    {
        return view('akses_publik.evaluasi_internal.index');
    }
}
