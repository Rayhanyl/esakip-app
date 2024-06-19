<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaKegia;
use Illuminate\Http\Request;
use App\Models\PerdaSubKegia;
use App\Models\PerdaSubKegiaIn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\PerdaSubKegiaPengampu;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSubKegiaController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('kegia_options', PerdaKegia::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        }));
        View::share('perdaSubKegiaData', PerdaSubKegia::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerdaSubKegia::whereUserId( Auth::user()->id)->get();
        return view('admin.perda.perencanaan.subkegiatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perda.perencanaan.subkegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = PerdaSubKegia::create(array_merge($request->only(PerdaSubKegia::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
        foreach (($request->pengampu ?? []) as $pengampu) {
            $param_pengampus = array_merge(['perda_subkegia_id' => $data->id],['pengampu_id' => $pengampu['value']]);
            PerdaSubKegiaPengampu::create($param_pengampus);
        }
        foreach ($request->indikator as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['perda_subkegia_id' => $data->id]);
            PerdaSubKegiaIn::create($params);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSubKegia $sasubkegium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSubKegia $sasubkegium)
    {
        $sasubkegium->load('perda_subkegia_ins', 'perda_subkegia_pengampus');
        return view('admin.perda.perencanaan.subkegiatan.edit', compact('sasubkegium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaSubKegia $sasubkegium)
    {
        $sasubkegium->update($request->only(PerdaSubKegia::FILLABLE_FIELDS));
        $savedIds = [];
        foreach (($request->pengampu ?? []) as $pengampu) {
            if ($pengampu['id'] ?? false) {
                $params_pengampu = PerdaSubKegiaPengampu::find($pengampu['id']);
            } else {
                $params_pengampu = new PerdaSubKegiaPengampu();
            }
            $params_pengampu->perda_subkegia_id = $sasubkegium->id;
            $params_pengampu->pengampu_id = $pengampu['value'];
            $params_pengampu->save();
            $savedIdPengampus[] = $params_pengampu->id;
        }
        if (count($savedIdPengampus)) {
            PerdaSubKegiaPengampu::where('perda_subkegia_id', $sasubkegium->id)->whereNotIn('id', $savedIdPengampus)->delete();
        } else {
            PerdaSubKegiaPengampu::where('perda_subkegia_id', $sasubkegium->id)->delete();
        }
        foreach (($request->indikator ?? []) as $indikator) {
            if ($indikator['id'] ?? false) {
                $params = PerdaSubKegiaIn::find($indikator['id']);
            } else {
                $params = new PerdaSubKegiaIn();
            }
            $params->user_id = Auth::user()->id ?? null;
            $params->perda_subkegia_id = $sasubkegium->id ?? null;
            $params->indikator = $indikator['indikator'] ?? null;
            $params->target = $indikator['target'] ?? null;
            $params->triwulan1 = $indikator['triwulan1'] ?? null;
            $params->triwulan2 = $indikator['triwulan2'] ?? null;
            $params->triwulan3 = $indikator['triwulan3'] ?? null;
            $params->triwulan4 = $indikator['triwulan4'] ?? null;
            $params->satuan_id = $indikator['satuan_id'] ?? null;
            $params->subkegiatan = $indikator['subkegiatan'] ?? null;
            $params->anggaran = $indikator['anggaran'] ?? null;
            $params->save();
            $savedIds[] = $params->id;
        }
        if (count($savedIds)) {
            PerdaSubKegiaIn::where('perda_subkegia_id', $sasubkegium->id)->whereNotIn('id', $savedIds)->delete();
        } else {
            PerdaSubKegiaIn::where('perda_subkegia_id', $sasubkegium->id)->delete();
        }
        Alert::toast('Data sasaran sub kegiatan telah diubah', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSubKegia $sasubkegium)
    {
        $sasubkegium->delete();
        return redirect()->back();
    }

    public function indicator()
    {
        return view('admin.perda.perencanaan.subkegiatan._partials.indicator');
    }

    public function pengampu()
    {
        return view('admin.perda.perencanaan.subkegiatan._partials.pengampu');
    }
}
