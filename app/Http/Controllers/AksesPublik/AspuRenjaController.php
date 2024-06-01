<?php

namespace App\Http\Controllers\AksesPublik;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SasaranStrategisIndikator;

class AspuRenjaController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();

        $perda = $request->perda;
        $tahun = $request->tahun;
        $perki = $request->perki;

        return view('akses_publik.perencanaan_kinerja.renja.index', compact('user', 'perda', 'tahun', 'perki'));
    }
}
