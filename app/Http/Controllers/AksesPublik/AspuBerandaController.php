<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuBerandaController extends Controller
{
    public function __invoke()
    {
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $data = [65, 59, 80, 81, 56, 55, 40];
        return view('akses_publik.beranda.index', compact('labels', 'data'));
    }
}
