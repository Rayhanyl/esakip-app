<?php

namespace App\Http\Controllers\AksesPublik;

use Illuminate\Http\Request;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use App\Models\User;

class AspuPelaporanKinerjaController extends Controller
{
    public function index(Request $request)
    {
        $perda = $request->perda;
        $tahun = $request->tahun;
        
        $data = PelaporanKinerja::with('user')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'perda');

            if ($request->tahun != null) {
                $q->where('tahun', $request->tahun);
            }

            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
        })->get();

        $user = User::where('role', 'perda')->get();
        return view('akses_publik.pelaporan_kinerja.index', compact('data', 'user','perda','tahun'));
    }
}
