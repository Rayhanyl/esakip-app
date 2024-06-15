<?php

namespace App\Http\Controllers\Aspu\Perencanaan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AspuRenstraController extends Controller
{
    public function perda(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = [];
        return view('aspu.perencanaan.perda.renstra.index', compact('data', 'user', 'perda', 'tahun'));
    }

    public function pemkab(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = [];
        return view('aspu.perencanaan.pemkab.rpjmd.index', compact('data', 'user', 'perda', 'tahun'));
    }
}
