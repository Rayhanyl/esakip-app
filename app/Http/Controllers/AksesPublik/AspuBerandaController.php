<?php

namespace App\Http\Controllers\AksesPublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuBerandaController extends Controller
{
    public function __invoke()
    {
        $labels = ['2019', '2020', '2021', '2022', '2023'];
        $data = [67, 67.18, 67.08, 67.1, 68];
        return view('akses_publik.beranda.index', compact('labels', 'data'));
    }
}
