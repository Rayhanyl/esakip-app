<?php

namespace App\Http\Controllers\Aspu\Evaluasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuEvaluasiController extends Controller
{
    public function index(Request $request)
    {
        return view('aspu.evaluasi.index');
    }

    public function download(Request $request)
    {
        return view('aspu.evaluasi.pdf');
    }
}
