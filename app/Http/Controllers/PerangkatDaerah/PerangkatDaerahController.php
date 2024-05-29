<?php

namespace App\Http\Controllers\PerangkatDaerah;

use Illuminate\Http\Request;
use App\Models\PelaporanKinerja;
use App\Http\Controllers\Controller;
use App\Models\PerangkatDaerahPengukuranKinerja;
use App\Models\PerangkatDaerahPerencanaanKinerjaActivityTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaActivityTargetIndicator;
use App\Models\PerangkatDaerahPerencanaanKinerjaProgramTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaProgramTargetIndicator;
use App\Models\PerencanaanKinerjaStrategicTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaStrategicTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaStrategicTargetIndicator;
use App\Models\PerangkatDaerahPerencanaanKinerjaSubActivityTarget;
use App\Models\PerangkatDaerahPerencanaanKinerjaSubActivityTargetIndicator;

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
        return view('perda.perencanaan_kinerja._partials.form-indikator-sasaran-strategis', compact('iter'));
    }

    public function sasaranProgram()
    {
        $sasaran_bupati = PerangkatDaerahPerencanaanKinerjaProgramTarget::with('indicators')->get();
        $sasaran_strategis = PerangkatDaerahPerencanaanKinerjaStrategicTarget::all();
        return view('perda.perencanaan_kinerja.sasaran_program', compact('sasaran_bupati', 'sasaran_strategis'));
    }

    public function sasaranProgramPost(Request $request)
    {
        $pdpkpt = PerangkatDaerahPerencanaanKinerjaProgramTarget::create([
            'perda_perencanaan_kinerja_strategic_target_id' => $request->sasaran_strategis ?? '',
            'year' => $request->year ?? '',
            'pengampu' => $request->pengampu ?? '',
            'sasaran_program' => $request->sasaran_program ?? '',
        ]);
        foreach ($request->indikator_sasaran_bupati ?? [] as $value) {
            PerangkatDaerahPerencanaanKinerjaProgramTargetIndicator::create([
                'perda_perencanaan_kinerja_program_target_id' => $pdpkpt->id,
                'indikator_program' => $value->indikator_program ?? '',
                'target' => $value->target ?? '',
                'satuan' => $value->satuan ?? '',
                'program' => $value->program ?? '',
                'anggaran' => $value->anggaran ?? '',
            ]);
        }
        return redirect()->back();
    }

    public function sasaranProgramAjax(Request $request)
    {
        $iter = $request->iter;
        return view('perda.perencanaan_kinerja._partials.form-indikator-sasaran-program', compact('iter'));
    }

    public function sasaranKegiatan()
    {
        $sasaran_bupati = PerangkatDaerahPerencanaanKinerjaActivityTarget::with('indicators')->get();
        $sasaran_program = PerangkatDaerahPerencanaanKinerjaProgramTarget::all();
        return view('perda.perencanaan_kinerja.sasaran_kegiatan', compact('sasaran_bupati', 'sasaran_program'));
    }

    public function sasaranKegiatanPost(Request $request)
    {
        $pdpkpt = PerangkatDaerahPerencanaanKinerjaActivityTarget::create([
            'perda_perencanaan_kinerja_program_target_id' => $request->sasaran_program ?? '',
            'year' => $request->year ?? '',
            'pengampu' => $request->pengampu ?? '',
            'sasaran_kegiatan' => $request->sasaran_kegiatan ?? '',
        ]);
        foreach ($request->indikator_sasaran_bupati ?? [] as $value) {
            PerangkatDaerahPerencanaanKinerjaActivityTargetIndicator::create([
                'perda_perencanaan_kinerja_activity_target_id' => $pdpkpt->id,
                'indikator_program' => $value->indikator_program ?? '',
                'target' => $value->target ?? '',
                'satuan' => $value->satuan ?? '',
                'program' => $value->program ?? '',
                'anggaran' => $value->anggaran ?? '',
            ]);
        }
        return redirect()->back();
    }

    public function sasaranKegiatanAjax(Request $request)
    {
        $iter = $request->iter;
        return view('perda.perencanaan_kinerja._partials.form-indikator-sasaran-kegiatan', compact('iter'));
    }

    public function sasaranSubKegiatan()
    {
        $sasaran_bupati = PerangkatDaerahPerencanaanKinerjaSubActivityTarget::with('indicators')->get();
        $sasaran_kegiatan = PerangkatDaerahPerencanaanKinerjaActivityTarget::all();
        return view('perda.perencanaan_kinerja.sasaran_subkegiatan', compact('sasaran_bupati', 'sasaran_kegiatan'));
    }

    public function sasaranSubKegiatanPost(Request $request)
    {
        $pdpkpt = PerangkatDaerahPerencanaanKinerjaSubActivityTarget::create([
            'perda_perencanaan_kinerja_activity_target_id' => $request->sasaran_kegiatan ?? '',
            'year' => $request->year ?? '',
            'pengampu' => $request->pengampu ?? '',
            'sasaran_sub_kegiatan' => $request->sasaran_sub_kegiatan ?? '',
        ]);
        foreach ($request->indikator_sasaran_bupati ?? [] as $value) {
            PerangkatDaerahPerencanaanKinerjaSubActivityTargetIndicator::create([
                'perda_perencanaan_kinerja_sub_activity_target_id' => $pdpkpt->id,
                'indikator_sub_kegiatan' => $value->indikator_sub_kegiatan ?? '',
                'triwulan1' => $value->triwulan1 ?? '',
                'triwulan2' => $value->triwulan2 ?? '',
                'triwulan3' => $value->triwulan3 ?? '',
                'triwulan4' => $value->triwulan4 ?? '',
                'target' => $value->target ?? '',
                'satuan' => $value->satuan ?? '',
                'sub_kegiatan' => $value->sub_kegiatan ?? '',
                'anggaran' => $value->anggaran ?? '',
            ]);
        }
        return redirect()->back();
    }

    public function sasaranSubKegiatanAjax(Request $request)
    {
        $iter = $request->iter;
        return view('perda.perencanaan_kinerja._partials.form-indikator-sasaran-sub-kegiatan', compact('iter'));
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
