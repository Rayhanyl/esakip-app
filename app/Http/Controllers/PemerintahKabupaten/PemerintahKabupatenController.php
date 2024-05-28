<?php

namespace App\Http\Controllers\PemerintahKabupaten;

use Illuminate\Http\Request;
use App\Models\PengukuranKinerja;
use App\Http\Controllers\Controller;
use App\Models\PerencanaanKinerjaStrategicTarget;
use App\Models\PerencanaanKinerjaStrategicTargetIndicator;

class PemerintahKabupatenController extends Controller
{
    public function index()
    {
        return view('pemkab.index');
    }

    public function pengukuranKinerja()
    {
        $sasaran_strategis = PerencanaanKinerjaStrategicTarget::with('indicators')->get();
        return view('pemkab.pengukuran_kinerja', compact('sasaran_strategis'));
    }

    public function pengukuranKinerjaAjax(Request $request)
    {
        $sasaran_strategis = PerencanaanKinerjaStrategicTarget::with('indicators')->find($request->sasaran_bupati)->get();
        return response()->json(['sasaran_strategis' => $sasaran_strategis]);
    }

    public function pengukuranKinerjaPost(Request $request)
    {
        PengukuranKinerja::create([
            'perencanaan_kinerja_strategic_target_id' => $request->perencanaan_kinerja_strategic_target_id ?? '',
            'indikator_sasaran' => $request->indikator_sasaran ?? '',
            'target_sasaran_strategis' => $request->target_sasaran_strategis ?? '',
            'realisasi' => $request->realisasi ?? '',
            'karakteristik' => $request->karakteristik ?? '',
            'target_sasaran_strategis' => $request->target_sasaran_strategis ?? '',
        ]);
        return redirect()->back();
    }
    public function perencanaanKinerja()
    {
        $sasaran_strategis = PerencanaanKinerjaStrategicTarget::with('indicators')->get();
        return view('pemkab.perencanaan_kinerja.sasaran_strategis', compact('sasaran_strategis'));
    }

    public function perencanaanKinerjaPost(Request $request)
    {
        $pkst = PerencanaanKinerjaStrategicTarget::create([
            'year' => $request->tahun ?? '',
            'sasaran_bupati' => $request->sasaran_bupati ?? '',
            'pengampu' => $request->pengampu ?? '',
        ]);
        foreach ($request->indikator_sasaran_bupati ?? [] as $value) {
            PerencanaanKinerjaStrategicTargetIndicator::create([
                'perencanaan_kinerja_strategic_target_id' => $pkst->id,
                'indikator' => $value['indikator_sasaran_bupati'],
                'target1' => $value['target_1'],
                'target2' => $value['target_2'],
                'target3' => $value['target_3'],
                'penjelasan' => $value['penjelasan'],
                'sumber_data' => $value['sumber_data'],
                'penanggung_jawab' => $value['penanggung_jawab'],
                'simple_action' => $value['simple_action'],
            ]);
        }
        return redirect()->back();
    }

    public function pelaporanKinerja()
    {
        return view('pemkab.pelaporan_kinerja');
    }

    public function addIndicator(Request $request)
    {
        $iter = $request->iter;
        return view('pemkab.perencanaan_kinerja._partials.form-indikator-sasaran-bupati', compact('iter'));
    }
}
