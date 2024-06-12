<?php

namespace App\Http\Controllers\AksesPublik;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SasaranStrategis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Models\SasaranStrategisIndikator;
use App\Models\Satuan;

class AspuIndikatorKinerjaUtamaController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $satuans = Satuan::all();
        $data = SasaranStrategis::with([
            'user',
            'indikators',
            'sasaran_penanggungjawab'
        ])->whereHas(
            'user',
            function ($q) use ($request) {
                $q->where('role', 'perda');
                if ($request->perda != null) {
                    $q->where('user_id', $request->perda ?? '');
                }
                if ($request->tahun != null) {
                    $q->where('tahun', $request->tahun ?? '');
                }
            }
        )
            ->get();
        return view('akses_publik.perencanaan_kinerja.indikator_kinerja_utama.index', compact('user', 'data', 'perda', 'tahun','satuans'));
    }

    public function pemkabIndex(Request $request)
    {
        $user = User::where('role', 'pemkab')->get();

        $pemkab = $request->pemkab;
        $tahun = $request->tahun;

        $data = SasaranStrategisIndikator::with('user', 'sasaran_strategis')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'pemkab');
            if ($request->pemkab != null) {
                $q->where('user_id', $request->pemkab);
            }
        })->whereHas('sasaran_strategis', function ($r) use ($request) {
            if ($request->tahun != null) {
                $r->where('tahun', $request->tahun ?? '');
            }
        })
            ->get();
        return view('akses_publik.perencanaan_kinerja.indikator_kinerja_utama.pemkab', compact('user', 'data', 'pemkab', 'tahun'));
    }
}
