<?php

namespace App\Http\Controllers\Aspu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspuBerandaController extends Controller
{
    public function __invoke()
    {
        $labels = ['2019', '2020', '2021', '2022', '2023'];
        $data = [67, 67.18, 67.08, 67.1, 68];
        return view('aspu.beranda.index', compact('labels', 'data'));
    }
}
