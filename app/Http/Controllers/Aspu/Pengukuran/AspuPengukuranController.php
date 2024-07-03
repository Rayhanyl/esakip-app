<?php

namespace App\Http\Controllers\Aspu\Pengukuran;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerdaPengukuran;
use App\Models\PemkabPengukuran;
use App\Http\Controllers\Controller;
use App\Models\PerdaPengukuranTahunan;
use App\Models\PerdaPengukuranTriwulan;

class AspuPengukuranController extends Controller
{
    public function perda(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $triwulan = $request->triwulan;

        // In your controller method
        $data_raw = PerdaPengukuran::with(['user', 'tahunans', 'triwulans'])->get();

        $data = $data_raw->groupBy(function ($item) {
            return $item->user_id . '-' . $item->tahun . '-' . $item->tipe;
        })->map(function ($group) {
            $triwulans = $group->pluck('triwulans')->flatten();
            $totalTriwulans = $triwulans->count();
            $sumCapaian = $triwulans->sum('capaian');
            $averageCapaian = $totalTriwulans > 0 ? $sumCapaian / $totalTriwulans : 0;

            return [
                'user_id' => $group->first()->user_id,
                'user' => $group->first()->user,
                'tahun' => $group->first()->tahun,
                'tipe' => $group->first()->tipe,
                'tahunans' => $group->pluck('tahunans')->flatten(),
                'triwulans' => $triwulans,
                'average_capaian' => $averageCapaian,
                'items' => $group
            ];
        });

        return view('aspu.pengukuran.index', compact('user', 'perda', 'tahun', 'triwulan', 'data'));
    }

    public function pemkab(Request $request)
    {
        $data = PemkabPengukuran::with('pemkab_sastra', 'pemkab_sastra_in')->get();
        return view('aspu.pengukuran.pemkab', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $pengukuran  = PerdaPengukuran::with('user')->findOrfail($id);
        if ($pengukuran->tipe == 'tahun') {
            $tahunan = PerdaPengukuranTahunan::with('perda_sastra', 'perda_sastra_in')->where('perda_pengukuran_id', $id)->first();
            $tahunans = PerdaPengukuranTahunan::with('perda_sastra', 'perda_sastra_in')
                ->orderBy('tahunan_capaian', 'desc')
                ->get();
            $data_ranking = $tahunans->map(function ($tahunan, $index) {
                return (object) [
                    'id' => $tahunan->perda_pengukuran_id,
                    'ranking' => $index + 1
                ];
            });
            $ranking = $data_ranking->firstWhere('id', $tahunan->perda_pengukuran_id);
            return view('aspu.pengukuran.detail_tahun', compact('pengukuran', 'tahunan', 'ranking'));
        } else {
            $tipe = $pengukuran->tipe;
            $triwulan = PerdaPengukuranTriwulan::with('perda_sastra', 'perda_sastra_in', 'perda_sub_kegia', 'perda_sub_kegia_in')
                ->where('perda_pengukuran_id', $id)->first();
            $triwulans = PerdaPengukuranTriwulan::with('perda_pengukuran', 'perda_sastra', 'perda_sastra_in', 'perda_sub_kegia', 'perda_sub_kegia_in')
                ->orderBy('capaian', 'desc')
                ->whereHas('perda_pengukuran', function ($r) use ($tipe) {
                    $r->where('tipe', $tipe);
                })
                ->get();
            $data_ranking = $triwulans->map(function ($triwulan, $index) {
                return (object) [
                    'id' => $triwulan->perda_pengukuran_id,
                    'ranking' => $index + 1
                ];
            });
            $ranking = $data_ranking->firstWhere('id', $triwulan->perda_pengukuran_id);
            return view('aspu.pengukuran.detail', compact('pengukuran', 'triwulan', 'ranking'));
        }
    }
}
