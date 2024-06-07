<?php

namespace App\Http\Controllers\AksesPublik;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerdaPengukuranKinerja;

class AspuPengukuranKinerjaController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();

        $perda = $request->perda;
        $tahun = $request->tahun;
        $triwulan = $request->triwulan;
        $data = PerdaPengukuranKinerja::all();
        dd($data);
        return view('akses_publik.pengukuran_kinerja.index', compact('user', 'perda', 'tahun', 'triwulan'));
    }
}
