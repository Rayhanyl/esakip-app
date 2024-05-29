<?php

namespace App\Http\Controllers\PerangkatDaerah;

use Illuminate\Http\Request;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\PerangkatDaerahPengukuranKinerja;
use App\Models\PerencanaanKinerjaStrategicTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaStrategicTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaStrategicTargetIndicator;

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
        $pdpkst = PerangkatDaerahPerencanaanKinerjaStrategicTarget::create([
            'perencanaan_kinerja_strategic_target_id' => $request->sasaran_bupati ?? '',
            'year' => $request->year ?? '',
            'pengampu' => $request->pengampu ?? '',
            'sasaran_strategis' => $request->sasaran_strategis ?? '',
        ]);
        foreach ($request->indikator_sasaran_bupati ?? [] as $value) {
            PerangkatDaerahPerencanaanKinerjaStrategicTargetIndicator::create([
                'perangkat_daerah_perencanaan_kinerja_strategic_target_id' => $pdpkst->id,
                'indikator_sasaran' => $value->indikator_sasaran ?? '',
                'target1' => $value->target1 ?? '',
                'target2' => $value->target2 ?? '',
                'target3' => $value->target3 ?? '',
                'satuan' => $value->satuan ?? '',
                'penjelasan' => $value->penjelasan ?? '',
                'tipe_perhitungan' => $value->tipe_perhitungan ?? '',
                'sumber_data' => $value->sumber_data ?? '',
                'penanggung_jawab' => $value->penanggung_jawab ?? '',
            ]);
        }
        return redirect()->back();
    }

    public function sasaranStrategisAjax(Request $request)
    {
        $iter = $request->iter;
        return view('perda.perencanaan_kinerja._partials.form-indikator-sasaran-bupati', compact('iter'));
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

    public function storePengukuranKinerja(Request $request)
    {
        // Create a new instance of the PengukuranKinerja model and fill it with the validated data
        PerangkatDaerahPengukuranKinerja::create([
            'year' => $request->input('year'),
            'triwulan' => $request->input('triwulan'),
            'perencanaan_kinerja_strategic_target_id' => $request->input('perencanaan_kinerja_strategic_target_id'),
            'indikator_sasaran' => $request->input('indikator_sasaran'),
            'sub_activity_id' => $request->input('sub_activity_id'),
            'indikator_sub_kegiatan' => $request->input('indikator_sub_kegiatan'),
            'target' => $request->input('target'),
            'realisasi' => $request->input('realisasi'),
            'karakteristik' => $request->input('karakteristik'),
            'capaian' => $request->input('capaian'),
            'anggaran_sub_kegiatan' => $request->input('anggaran_sub_kegiatan'),
            'anggaran_pagu' => $request->input('anggaran_pagu'),
            'anggaran_realisasi' => $request->input('anggaran_realisasi'),
            'anggaran_capaian' => $request->input('anggaran_capaian'),
            'tahunan_sasaran_strategis' => $request->input('tahunan_sasaran_strategis'),
            'tahunan_indikator_sasaran' => $request->input('tahunan_indikator_sasaran'),
            'tahunan_target' => $request->input('tahunan_target'),
            'tahunan_realisasi' => $request->input('tahunan_realisasi'),
            'tahunan_karateristik' => $request->input('karakteristik_tahunan'),
            'tahunan_capaian' => $request->input('tahunan_capaian'),
        ]);

        // Optionally, you can return a response or redirect the user
        return redirect()->route('perda.pengukuran.kinerja.page')->with('success', 'Data stored successfully!');
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

        // Store the file in the 'public/media' directory
        $path = $request->file('file')->store('public/media');

        // Create a new record in the database
        PelaporanKinerja::create([
            'year' => $request->tahun,
            'evidence' => $request->file->hashName(),
        ]);

        return redirect()->route('perda.pelaporan.kinerja.page')->with('success', 'Pelaporan Kinerja created successfully.');
    }

    public function evaluasiInternal()
    {
        
        return view('perda.evaluasi_internal');
    }

    public function downloadPelaporan($filename)
    {
        // Retrieve the file path from the storage
        $filePath = storage_path('app/public/media/' . $filename);

        // Check if the file exists
        if (!Storage::exists('public/media/' . $filename)) {
            abort(404);
        }

        // Return the file for download
        return response()->download($filePath);
    }
}
