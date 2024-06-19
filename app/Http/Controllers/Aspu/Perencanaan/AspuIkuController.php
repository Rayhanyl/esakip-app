<?php

namespace App\Http\Controllers\Aspu\Perencanaan;

use App\Models\User;
use App\Models\Satuan;
use App\Models\PerdaSastra;
use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use App\Http\Controllers\Controller;
use App\Models\PemkabSastraIn;

class AspuIkuController extends Controller
{
    public function perda(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = PerdaSastraIn::with('user', 'perda_sastra', 'satuan', 'penanggung_jawabs')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'perda');
            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
        })->whereHas('perda_sastra', function ($r) use ($request) {
            if ($request->tahun != null) {
                $r->where('tahun', $request->tahun ?? '');
            }
        })->get();
        return view('aspu.perencanaan.perda.iku.index', compact('user', 'data', 'perda', 'tahun'));
    }

    public function pemkab(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $satuans = Satuan::all();
        $data = PemkabSastraIn::with([
            'user',
            'pemkab_sastra',
            'satuan',
            'simple_actions',
            'penanggung_jawabs'
        ])->whereHas('user', function ($q) use ($request) {
            if ($request->perda != null) {
                $q->where('user_id', $request->perda ?? '');
            }
        })->whereHas('pemkab_sastra', function ($r) use ($request) {
            if ($request->tahun != null) {
                $r->where('tahun', $request->tahun ?? '');
            }
        })->get();
        return view('aspu.perencanaan.pemkab.iku.index', compact('user', 'data', 'perda', 'tahun', 'satuans'));
    }
}
