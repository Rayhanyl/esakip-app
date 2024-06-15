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
        $data = [];
        return view('aspu.perencanaan.perda.renja.index', compact('data', 'perda', 'tahun', 'user'));
    }

    public function pemkab(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = [];
        return view('aspu.perencanaan.pemkab.rkpd.index',  compact('data', 'perda', 'tahun', 'user'));
    }
}
