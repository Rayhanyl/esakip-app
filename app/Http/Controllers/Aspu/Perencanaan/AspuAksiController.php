<?php

namespace App\Http\Controllers\Aspu\Perencanaan;

use Svg\Tag\Rect;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use App\Http\Controllers\Controller;
use App\Models\PemkabSastraIn;

class AspuAksiController extends Controller
{
    public function perda(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = PerdaSastraIn::with('user', 'perda_sastra')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'perda');
            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
        })->whereHas('perda_sastra', function ($r) use ($request) {
            if ($request->tahun != null) {
                $r->where('tahun', $request->tahun ?? '');
            }
        })->get();
        return view('aspu.perencanaan.perda.aksi.index', compact('user', 'data', 'tahun', 'perda'));
    }

    public function pemkab(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = PemkabSastraIn::with('user', 'pemkab_sastra')->whereHas('user', function ($q) use ($request) {
            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
        })->whereHas('pemkab_sastra', function ($r) use ($request) {
            if ($request->tahun != null) {
                $r->where('tahun', $request->tahun ?? '');
            }
        })->get();
        return view('aspu.perencanaan.pemkab.aksi.index', compact('user', 'data', 'tahun', 'perda'));
    }
}
