<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuBerandaController extends Controller
{
    public function __invoke()
    {
        return view('akses_publik.beranda.index');
    }
}
