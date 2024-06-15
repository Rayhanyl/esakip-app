<?php

namespace App\Http\Controllers\Aspu\Pelaporan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerdaPelaporan;
use App\Http\Controllers\Controller;

class AspuPelaporanController extends Controller
{
    public function index(Request $request)
    {
        $user  = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = PerdaPelaporan::with('user')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'perda');
            if ($request->tahun != null) {
                $q->where('tahun', $request->tahun);
            }
            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
        })->get();
        return view('aspu.pelaporan.index', compact('data', 'user', 'perda', 'tahun'));
    }

    public function count(Request $request)
    {
        $pelaporan = PerdaPelaporan::find($request->id);
        if ($pelaporan) {
            $pelaporan->keterangan += 1;
            $pelaporan->save();
            return response()->json(['success' => true, 'keterangan' => $pelaporan->keterangan]);
        }
        return response()->json(['success' => false], 400);
    }
}
