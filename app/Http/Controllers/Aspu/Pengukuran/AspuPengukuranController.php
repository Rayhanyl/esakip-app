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

        $data = PerdaPengukuran::with('user', 'tahunans', 'triwulans')
            ->whereHas('user', function ($q) use ($perda) {
                $q->where('role', 'perda');
                if ($perda) {
                    $q->where('id', $perda);
                }
            })
            ->when($tahun, function ($query, $tahun) {
                return $query->where('tahun', $tahun);
            })
            ->when($triwulan, function ($query, $triwulan) {
                return $query->where('triwulan', $triwulan);
            })
            ->get();
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
