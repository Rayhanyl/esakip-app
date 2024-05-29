<?php

namespace App\Http\Controllers\PerangkatDaerah;

use Illuminate\Http\Request;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use App\Models\PerangkatDaerahPengukuranKinerja;
use App\Models\PerencanaanKinerjaStrategicTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaStrategicTarget;

class PerangkatDaerahController extends Controller
{
    public function index()
    {
        return view('perda.index');
    }

    public function sasaranStrategis()
    {
        $sasaran_bupati = PerencanaanKinerjaStrategicTarget::with('indicators')->get();
        $sasaran_strategis = PerangkatDaerahPerencanaanKinerjaStrategicTarget::all();
        return view('perda.perencanaan_kinerja.sasaran_strategis', compact('sasaran_bupati', 'sasaran_strategis'));
    }
    public function sasaranStrategisPost(Request $request)
    {
        PerangkatDaerahPerencanaanKinerjaStrategicTarget::create([
            'perencanaan_kinerja_strategic_target_id' => $request->sasaran_bupati ?? '',
            'year' => $request->year ?? '',
            'pengampu' => $request->pengampu ?? '',
            'sasaran_strategis' => $request->sasaran_strategis ?? '',
            'indikator_sasaran' => $request->indikator_sasaran ?? '',
            'target1' => $request->target1 ?? '',
            'target2' => $request->target2 ?? '',
            'target3' => $request->target3 ?? '',
            'satuan' => $request->satuan ?? '',
            'penjelasan' => $request->penjelasan ?? '',
            'tipe_perhitungan' => $request->tipe_perhitungan ?? '',
            'sumber_data' => $request->sumber_data ?? '',
            'penanggung_jawab' => $request->penanggung_jawab ?? '',
        ]);
        return redirect()->back();
    }

    public function sasaranProgram()
    {
        $sasaran_bupati = PerencanaanKinerjaStrategicTarget::with('indicators')->get();
        return view('perda.perencanaan_kinerja.sasaran_program', compact('sasaran_bupati'));
    }

    public function sasaranKegiatan()
    {
        return view('perda.perencanaan_kinerja.sasaran_kegiatan');
    }

    public function sasaranSubKegiatan()
    {
        return view('perda.perencanaan_kinerja.sasaran_subkegiatan');
    }

    public function pengukuranKinerja()
    {
        $sasaran_bupati = PerencanaanKinerjaStrategicTarget::with('indicators')->get();
        return view('perda.pengukuran_kinerja', compact('sasaran_bupati'));
    }

    public function pengukuranKinerjaPost(Request $request)
    {
        PerangkatDaerahPengukuranKinerja::create($request->all());
        return redirect()->back();
    }

    public function pelaporanKinerja()
    {
        $pelaporanKinerja = PelaporanKinerja::all();

        return view('perda.pelaporan_kinerja', compact('pelaporanKinerja'));
    }

    public function storePelaporan(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $path = $request->file('file')->store('pelaporan_kinerja_files');

        PelaporanKinerja::create([
            'year' => $request->tahun,
            'evidence' => $path,
        ]);

        return redirect()->route('perda.pelaporan_kinerja')->with('success', 'Pelaporan Kinerja created successfully.');
    }

    public function evaluasiInternal()
    {
        return view('perda.evaluasi_internal');
    }
}
