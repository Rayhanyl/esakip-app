<?php

namespace App\Http\Controllers\Aspu\Pelaporan;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PerdaPelaporan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
            $pelaporan->count += 1;
            $pelaporan->save();
            return response()->json(['success' => true, 'count' => $pelaporan->count]);
        }
        return response()->json(['success' => false], 400);
    }

    public function download(Request $request, $id)
    {
        $pelaporan = PerdaPelaporan::find($id);
        $filePath = storage_path('app/public/pelaporan-kinerja/perda/' . $pelaporan->file);
        if (!Storage::exists('public/pelaporan-kinerja/perda/' . $pelaporan->file)) {
            Alert::toast('Gagal download file', 'danger');
            return redirect()->back()->with('error', 'File not found.');
        }
        Alert::toast('Berhasil download file', 'success');
        session()->flash('success', 'File downloaded successfully.');
        return response()->download($filePath);
    }
}
