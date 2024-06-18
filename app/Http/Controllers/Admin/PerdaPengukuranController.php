<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSastra;
use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use App\Models\PerdaSubKegia;
use App\Models\PerdaPengukuran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\PerdaPengukuranTahunan;
use App\Http\Requests\StorePerdaPengukuranRequest;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Requests\UpdatePerdaPengukuranRequest;

class PerdaPengukuranController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();

        View::share('sasaran_strategis_options', PerdaSastra::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_strategis;
        }));
        View::share('sasaran_sub_kegiatan_options', PerdaSubKegia::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_sub_kegiatan;
        }));
        View::share('tahun_options', collect(array_combine(range(2029, 2020, -1), range(2029, 2020, -1)))->transform(function ($list) {
            return $list;
        }));
        View::share('triwulan_options', collect(array_combine(['1', '2', '3', '4', 'tahun'], ['1', '2', '3', '4', 'Tahunan']))->transform(function ($list) {
            return $list;
        }));
        View::share('karakteristik_options', collect(array_combine(['1', '2'], ['Semakin tinggi realisasi maka capaian
            semakin bagus', 'Semakin rendah realisasi maka capaian semakin bagus']))->transform(function ($list) {
            return $list;
        }));
    }

    public function index()
    {
        $data_pengukuran = PerdaPengukuran::with('tahunans')->get();
        return view('admin.perda.pengukuran.index', compact('data_pengukuran'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $pengukuran = PerdaPengukuran::create(array_merge($request->only(PerdaPengukuran::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
        if ($request->tahunan_sasaran_strategis_id ?? false) {
            $tahunan = PerdaPengukuranTahunan::create([
                'perda_pengukuran_id' => $pengukuran->id,
                'perda_sastra_id' => $request->tahunan_sasaran_strategis_id,
                'perda_sastra_in_id' => $request->tahunan_sasaran_strategis_indikator_id,
                'tahunan_target' => $request->tahunan_target,
                'tahunan_realisasi' => $request->tahunan_realisasi,
                'tahunan_karakteristik' => $request->tahunan_karakteristik,
                'tahunan_capaian' => $request->tahunan_capaian,
            ]);
        }
        return redirect()->back()->with('success', '');
    }

    public function show(PerdaPengukuran $perdaPengukuran)
    {
        //
    }

    public function edit(PerdaPengukuran $perdaPengukuran)
    {
        //
    }

    public function update(UpdatePerdaPengukuranRequest $request, PerdaPengukuran $perdaPengukuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPengukuran $perdaPengukuran)
    {
        //
    }
    public function get_data(Request $request)
    {
        switch ($request->type) {
            case 'sastra':
                $data = PerdaSastra::whereTahun($request->params)->get();
                break;
            case 'sastra_in':
                $data = PerdaSastraIn::wherePerdaSastraId($request->params)->get();
                break;
            default:
                break;
        }
        return response()->json($data);
    }
    public function get_value(Request $request)
    {
        switch ($request->type) {
            case 'target_tahunan':
                $data = PerdaSastraIn::whereid($request->params)->first();
                break;
            default:
                break;
        }
        return response()->json($data);
    }
}