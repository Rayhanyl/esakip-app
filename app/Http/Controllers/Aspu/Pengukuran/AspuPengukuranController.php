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

        $data_raw = PerdaPengukuran::with(['user', 'tahunans', 'triwulans'])->get();

        $data = $data_raw->groupBy(function ($item) {
            return $item->user_id . '-' . $item->tahun . '-' . $item->tipe;
        })->map(function ($group) {
            $tahunans = $group->pluck('tahunans')->flatten();
            $totalTahunans = $tahunans->count();
            $sumTahunanCapaian = $tahunans->sum('tahunan_capaian');
            $averageTahunanCapaian = $totalTahunans > 0 ? $sumTahunanCapaian / $totalTahunans : 0;

            $triwulans = $group->pluck('triwulans')->flatten();
            $totalTriwulans = $triwulans->count();
            $sumTriwulanCapaian = $triwulans->sum('capaian');
            $averageTriwulanCapaian = $totalTriwulans > 0 ? $sumTriwulanCapaian / $totalTriwulans : 0;

            return [
                'user_id' => $group->first()->user_id,
                'user' => $group->first()->user,
                'tahun' => $group->first()->tahun,
                'tipe' => $group->first()->tipe,
                'tahunans' => $tahunans,
                'sum_tahunan_capaian' => $averageTahunanCapaian,
                'triwulans' => $triwulans,
                'average_triwulan_capaian' => $averageTriwulanCapaian,
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

    public function detail(Request $request, $id, $tahun, $triwul, $tipe, $user)
    {
        $users = User::findOrFail($user);
        if ($tipe == 'tahunan') {
            $data_tahunan = PerdaPengukuran::with([
                'user',
                'tahunans',
                'tahunans.perda_sastra',
                'tahunans.perda_sastra_in',
            ])
                ->where('user_id', $user)
                ->where('tahun', $tahun)
                ->where('tipe', $triwul)
                ->get();
            $data_ranking = PerdaPengukuranTahunan::with('perda_pengukuran', 'perda_sastra', 'perda_sastra_in')
                ->orderBy('tahunan_capaian', 'desc')
                ->whereHas('perda_pengukuran', function ($r) use ($triwul) {
                    $r->where('tipe', $triwul);
                })
                ->whereHas('perda_pengukuran', function ($q) use ($tahun) {
                    $q->where('tahun', $tahun);
                })
                ->get();
            // Group data by user and calculate total and average achievement
            $userAchievements = [];
            foreach ($data_ranking as $ranking) {
                $userId = $ranking->perda_pengukuran->user_id;
                if (!isset($userAchievements[$userId])) {
                    $userAchievements[$userId] = ['total' => 0, 'count' => 0];
                }
                $userAchievements[$userId]['total'] += $ranking->tahunan_capaian;
                $userAchievements[$userId]['count'] += 1;
            }
            // Calculate average achievement for each user
            foreach ($userAchievements as $userId => $achievements) {
                $userAchievements[$userId]['average'] = $achievements['total'] / $achievements['count'];
            }
            // Sort users by their average achievement in descending order
            uasort($userAchievements, function ($a, $b) {
                return $b['average'] <=> $a['average'];
            });
            // Initialize a counter for ranking
            $i = 1;
            $rankingList = collect($userAchievements)->map(function ($achievements, $userId) use (&$i) {
                return [
                    'user_id' => $userId,
                    'average_achievement' => $achievements['average'],
                    'ranking' => $i++,
                ];
            })->values()->all();
            // Find the ranking for the specific user
            $ranking = collect($rankingList)->firstWhere('user_id', $user);
            $tahunan = $data_tahunan;
            return view('aspu.pengukuran.detail_tahun', compact('users', 'tahunan', 'ranking'));
        } else {
            $data_triwulan = PerdaPengukuran::with([
                'user',
                'triwulans',
                'triwulans.perda_sastra',
                'triwulans.perda_sastra_in',
                'triwulans.perda_sub_kegia',
                'triwulans.perda_sub_kegia_in',
            ])
                ->where('user_id', $user)
                ->where('tahun', $tahun)
                ->where('tipe', $triwul)
                ->get();
            $data_ranking = PerdaPengukuranTriwulan::with('perda_pengukuran', 'perda_sastra', 'perda_sastra_in', 'perda_sub_kegia', 'perda_sub_kegia_in')
                ->orderBy('capaian', 'desc')
                ->whereHas('perda_pengukuran', function ($r) use ($triwul) {
                    $r->where('tipe', $triwul);
                })
                ->whereHas('perda_pengukuran', function ($q) use ($tahun) {
                    $q->where('tahun', $tahun);
                })
                ->get();
            // Group data by user and calculate total and average achievement
            $userAchievements = [];
            foreach ($data_ranking as $ranking) {
                $userId = $ranking->perda_pengukuran->user_id;
                if (!isset($userAchievements[$userId])) {
                    $userAchievements[$userId] = ['total' => 0, 'count' => 0];
                }
                $userAchievements[$userId]['total'] += $ranking->capaian;
                $userAchievements[$userId]['count'] += 1;
            }
            // Calculate average achievement for each user
            foreach ($userAchievements as $userId => $achievements) {
                $userAchievements[$userId]['average'] = $achievements['total'] / $achievements['count'];
            }
            // Sort users by their average achievement in descending order
            uasort($userAchievements, function ($a, $b) {
                return $b['average'] <=> $a['average'];
            });
            // Initialize a counter for ranking
            $i = 1;
            $rankingList = collect($userAchievements)->map(function ($achievements, $userId) use (&$i) {
                return [
                    'user_id' => $userId,
                    'average_achievement' => $achievements['average'],
                    'ranking' => $i++,
                ];
            })->values()->all();
            // Find the ranking for the specific user
            $ranking = collect($rankingList)->firstWhere('user_id', $user);
            $triwulan = $data_triwulan;
            return view('aspu.pengukuran.detail', compact('users', 'triwulan', 'ranking'));
        }
    }
}
