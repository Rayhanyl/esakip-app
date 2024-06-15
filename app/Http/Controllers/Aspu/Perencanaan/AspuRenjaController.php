<?php

namespace App\Http\Controllers\Aspu\Perencanaan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PemkabSastra;
use App\Models\PerdaSastra;

class AspuRenjaController extends Controller
{
    public function perda(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = PerdaSastra::with([
            'user',
            'perda_sastra_ins',
            'perda_progs.perda_prog_ins',
            'perda_progs.perda_kegias.perda_kegia_ins',
            'perda_progs.perda_kegias.perda_subkegias',
            'perda_progs.perda_kegias.perda_subkegias.perda_subkegia_ins'
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
        )->get();
        return view('aspu.perencanaan.perda.renja.index');
    }

    public function pemkab(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = PemkabSastra::with([
            'user',
            'sasaran_penanggungjawabs',
            'pemkab_sastra_ins',
            'sasaran_strategis',
            'sasaran_strategis.sasaran_programs',
            'sasaran_strategis.sasaran_programs.sasaran_kegiatans',
            'sasaran_strategis.sasaran_programs.sasaran_kegiatans.sasaran_sub_kegiatans',
            'sasaran_strategis.sasaran_programs.sasaran_kegiatans.sasaran_sub_kegiatans.indikators',
        ])->whereHas('user', function ($q) use ($request) {
                if ($request->perda != null) {
                    $q->where('user_id', $request->perda ?? '');
                }
                if ($request->tahun != null) {
                    $q->where('tahun', $request->tahun ?? '');
                }
            }
        )->get();
        return view('aspu.perencanaan.pemkab.rkpd.index');
    }
}
