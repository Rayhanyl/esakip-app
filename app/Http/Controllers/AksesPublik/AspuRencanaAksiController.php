<?php

namespace App\Http\Controllers\AksesPublik;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SasaranStrategisIndikator;

class AspuRencanaAksiController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();

        $perda = $request->perda;
        $tahun = $request->tahun;

        $data = SasaranStrategisIndikator::with('user', 'sasaran_strategis')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'perda');
            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
        })->whereHas('sasaran_strategis', function ($r) use ($request) {
            if ($request->tahun != null) {
                $r->where('tahun', $request->tahun ?? '');
            }
        })
            ->get();
        return view('akses_publik.perencanaan_kinerja.rencana_aksi.index', compact('user','data','tahun','perda'));
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
        return view('akses_publik.perencanaan_kinerja.rencana_aksi.pemkab', compact('user','data','tahun','pemkab'));
    }
}
