<?php

namespace App\Http\Controllers\AksesPublik;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use App\Models\InspekEvaluasiInternal;
use RealRashid\SweetAlert\Facades\Alert;

class AspuEvaluasiInternalController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve users with role 'perda'
        $user = User::where('role', 'perda')->get();

        // Extract user IDs
        $userIds = $user->pluck('id');

        // Filter parameters
        $perda = $request->perda;
        $tahun = $request->tahun;

        // Query to filter data
        $query = InspekEvaluasiInternal::query();

        // Filter by user role
        $query->whereHas('user', function ($q) use ($userIds) {
            $q->whereIn('id', $userIds);
        });

        // Filter by perda
        if ($perda) {
            $query->where('user_id', $perda);
        }

        // Filter by tahun
        if ($tahun) {
            $query->where('tahun', $tahun);
        }

        // Retrieve filtered data with relationships
        $data = $query->with('komponens.sub_komponens')->get();

        // Calculate the sum of nilai for each InspekEvaluasiInternal
        $nilaiSums = [];
        foreach ($data as $inspekEvaluasi) {
            $sum = 0;
            foreach ($inspekEvaluasi->komponens as $komponen) {
                foreach ($komponen->sub_komponens as $subKomponen) {
                    $sum += $subKomponen->nilai;
                }
            }
            $nilaiSums[$inspekEvaluasi->id] = $sum;
        }
        return view('akses_publik.evaluasi_internal.index', compact('user', 'data', 'perda', 'tahun', 'nilaiSums'));
    }

    public function download(Request $request)
    {
        $data = [];
        $pdf = PDF::loadView('akses_publik.evaluasi_internal.lhe', $data, ['orientation' => 'portrait']);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('LHE' . '.pdf');
        // return view('akses_publik.evaluasi_internal.lhe');
    }
}
