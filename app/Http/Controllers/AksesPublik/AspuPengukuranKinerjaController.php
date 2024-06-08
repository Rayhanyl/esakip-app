<?php

namespace App\Http\Controllers\AksesPublik;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerdaPengukuranKinerja;

class AspuPengukuranKinerjaController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $triwulan = $request->triwulan;
        $query = PerdaPengukuranKinerja::with('user');
        if ($perda) {
            $query->whereHas('user', function ($q) use ($perda) {
                $q->where('id', $perda);
            });
        }
        if ($tahun) {
            $query->where('tahun', $tahun);
        }
        if ($triwulan) {
            $query->where('triwulan', $triwulan);
        }
        $data = $query->get();
        return view('akses_publik.pengukuran_kinerja.index', compact('user', 'perda', 'tahun', 'triwulan', 'data'));
    }

    public function detail(Request $request, $user, $tahun = null, $triwulan = null)
    {
        $user = User::findOrFail($user);
        $tahun = ($tahun === 'null') ? null : $tahun;
        $triwulan = ($triwulan === 'null') ? null : $triwulan;
        $tahun = $tahun ?: $request->input('tahun');
        $triwulan = $triwulan ?: $request->input('triwulan');
        $query = PerdaPengukuranKinerja::with([
            'user',
            'sasaran_strategis',
            'sasaran_strategis_indikator',
        ])->whereHas('user', function ($q) use ($user) {
            $q->where('id', $user->id);
        });
        if ($tahun != 'tahunan') {
            $query->with([
                'sasaran_sub_kegiatan',
                'sasaran_sub_kegiatan_indikator',
            ]);
        }
        if ($tahun) {
            $query->where('tahun', $tahun);
        }
        if ($triwulan) {
            $query->where('triwulan', $triwulan);
        }
        $data = $query->get();
        return view('akses_publik.pengukuran_kinerja.perangkat_daerah_detail.index', compact('data', 'user', 'tahun', 'triwulan'));
    }
}
