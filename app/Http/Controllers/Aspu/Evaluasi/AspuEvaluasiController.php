<?php

namespace App\Http\Controllers\Aspu\Evaluasi;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AspuEvaluasiController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'perda')->get();
        $userIds = $user->pluck('id');
        $perda = $request->perda;
        $tahun = $request->tahun;
        $query = [];
        $data = [];
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
        return view('aspu.evaluasi.index', compact('user', 'data', 'perda', 'tahun', 'nilaiSums'));
    }

    public function download(Request $request)
    {
        return view('aspu.evaluasi.pdf');
    }
}
