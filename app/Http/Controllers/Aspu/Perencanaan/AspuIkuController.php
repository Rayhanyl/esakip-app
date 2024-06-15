<?php

namespace App\Http\Controllers\Aspu\Perencanaan;

use App\Models\User;
use App\Models\Satuan;
use App\Models\PerdaSastra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PemkabSastra;

class AspuIkuController extends Controller
{
    public function perda(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $satuans = Satuan::all();
        $data = PerdaSastra::with([
            'user',
            'perda_sastra_ins',
            'perda_sastra_ins.perda_sastra_penjas',
        ])->whereHas('user', function ($q) use ($request){
            $q->where('role', 'perda');
                if ($request->perda != null) {
                    $q->where('user_id', $request->perda ?? '');
                }
                if ($request->tahun != null) {
                    $q->where('tahun', $request->tahun ?? '');
                }
            }
        )->get();
        return view('aspu.perencanaan.perda.iku.index', compact('user', 'data', 'perda', 'tahun', 'satuans'));
    }

    public function pemkab(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $satuans = Satuan::all();
        $data = PemkabSastra::with([
            'user',
            'pemkab_sastra_ins',
            'pemkab_sastra_ins.simple_actions',
            'pemkab_sastra_ins.penanggung_jawabs'
        ])->whereHas(
            'user',
            function ($q) use ($request) {
                if ($request->perda != null) {
                    $q->where('user_id', $request->perda ?? '');
                }
                if ($request->tahun != null) {
                    $q->where('tahun', $request->tahun ?? '');
                }
            }
        )
            ->get();
        return view('aspu.perencanaan.pemkab.iku.index', compact('user', 'data', 'perda', 'tahun', 'satuans'));
    }
}
