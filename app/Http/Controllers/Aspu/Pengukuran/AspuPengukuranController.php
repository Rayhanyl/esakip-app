<?php

namespace App\Http\Controllers\Aspu\Pengukuran;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerdaPengukuran;
use App\Http\Controllers\Controller;

class AspuPengukuranController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $triwulan = $request->triwulan;
        $data = PerdaPengukuran::with('user')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'perda');
            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
            if ($request->tahun != null) {
                $q->where('user_id', $request->perda);
            }
            if ($request->triwulan != null) {
                $q->where('user_id', $request->perda);
            }
        })->get();
        return view('aspu.pengukuran.index', compact('user', 'perda', 'tahun', 'triwulan', 'data'));
    }

    public function detail(Request $request, $user)
    {
        $user = User::findOrFail($user);
        $perda = $request->perda;
        $tahun = $request->tahun;
        $triwulan = $request->triwulan;
        $data = [];
        return view('aspu.pengukuran.detail', compact('user', 'perda', 'tahun', 'triwulan', 'data'));
    }
}
