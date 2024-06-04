<?php

namespace App\Http\Controllers\AksesPublik;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use App\Models\InspekEvaluasiInternal;

class AspuEvaluasiInternalController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = InspekEvaluasiInternal::with('komponens')->get();
        return view('akses_publik.evaluasi_internal.index', compact('user', 'data', 'perda', 'tahun'));
    }
}
