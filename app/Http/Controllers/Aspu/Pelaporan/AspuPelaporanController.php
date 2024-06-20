<?php

namespace App\Http\Controllers\Aspu\Pelaporan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerdaPelaporan;
use App\Http\Controllers\Controller;
use App\Models\PemkabPelaporan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AspuPelaporanController extends Controller
{
    public function perda(Request $request)
    {
        $user  = User::get();
        $perda = $request->perda;
        $tahun = $request->tahun;
        $data = PerdaPelaporan::when($request->tahun, function ($query, $tahun) {
            return $query->where('tahun', $tahun);
        })
            ->when($request->perda, function ($query, $perda) {
                return $query->where('user_id', $perda);
            })
            ->get();
        return view('aspu.pelaporan.index', compact('data', 'user', 'perda', 'tahun'));
    }

    public function pemkab(Request $request)
    {
        $tahun = $request->tahun;
        $data = PemkabPelaporan::when($request->tahun, function ($query, $tahun) {
            return $query->where('tahun', $tahun);
        })->get();
        return view('aspu.pelaporan.pemkab', compact('data', 'tahun'));
    }

    public function count(Request $request)
    {
        try {
            if ($request->tipe == 'perda') {
                $pelaporan = PerdaPelaporan::find($request->id);
                if ($pelaporan) {
                    $pelaporan->count += 1;
                    $pelaporan->save();
                    return response()->json(['success' => true, 'count' => $pelaporan->count]);
                }
                return response()->json(['success' => false], 400);
            } else {
                $pelaporan = PemkabPelaporan::find($request->id);
                if ($pelaporan) {
                    $pelaporan->count += 1;
                    $pelaporan->save();
                    return response()->json(['success' => true, 'count' => $pelaporan->count]);
                }
                return response()->json(['success' => false], 400);
            }
        } catch (\Exception $e) {
            Alert::toast('Error count download file', 'danger');
        }
    }

    public function download(Request $request, $id, $tipe)
    {
        try {

            if ($tipe == 'perda') {
                $pelaporan = PerdaPelaporan::find($id);
                $filePath = storage_path('app/public/pelaporan-kinerja/perda/' . $pelaporan->file);
                if (!Storage::exists('public/pelaporan-kinerja/perda/' . $pelaporan->file)) {
                    Alert::toast('Gagal download file', 'danger');
                    return redirect()->back()->with('error', 'File not found.');
                }
                Alert::toast('Berhasil download file', 'success');
                return response()->download($filePath);
            } else {
                $pelaporan = PemkabPelaporan::find($id);
                $filePath = storage_path('app/public/pelaporan-kinerja/pemkab/' . $pelaporan->file);
                if (!Storage::exists('public/pelaporan-kinerja/pemkab/' . $pelaporan->file)) {
                    Alert::toast('Gagal download file', 'danger');
                    return redirect()->back()->with('error', 'File not found.');
                }
                Alert::toast('Berhasil download file', 'success');
                return response()->download($filePath);
            }
        } catch (\Exception $e) {
            Alert::toast('Gagal download file', 'danger');
        }
    }
}
