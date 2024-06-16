<?php

namespace App\Http\Controllers\Admin;

use App\Models\PemkabPenja;
use App\Models\PemkabSastra;
use App\Models\PemkabSimact;
use Illuminate\Http\Request;
use App\Models\PemkabSastraIn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PemkabSastraController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('pemkabSastraData', PemkabSastra::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemkab.sastra.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemkab.sastra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = PemkabSastra::create(array_merge($request->only(PemkabSastra::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
        foreach ($request->indikator as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['pemkab_sastra_id' => $data->id]);
            $data2 = PemkabSastraIn::create($params);
            foreach ($value['penanggung_jawab'] as $value2) {
                $params2 = ['pemkab_sastra_in_id' => $data2->id, 'penanggung_jawab' => $value2['value']];
                PemkabPenja::create($params2);
            }
            foreach ($value['action'] as $value2) {
                $params2 = ['pemkab_sastra_in_id' => $data2->id, 'action' => $value2['value']];
                PemkabSimact::create($params2);
            }
        }
        to_route('admin.pemkab.sastra.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabSastra $pemkabSastra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabSastra $sastra)
    {
        $sastra->load('pemkab_sastra_ins', 'pemkab_sastra_ins.simple_actions','pemkab_sastra_ins.penanggung_jawabs');
        return view('admin.pemkab.sastra.edit', compact('sastra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PemkabSastra $sastra)
    {
        $sastra->update($request->only(PemkabSastra::FILLABLE_FIELDS));
        $savedIds = [];
        foreach (($request->indikator ?? []) as $indikator) {
            if ($indikator['id'] ?? false) {
                $params = PemkabSastraIn::find($indikator['id']);
            } else {
                $params = new PemkabSastraIn();
            }
            $params->user_id = Auth::user()->id ?? null;
            $params->pemkab_sastra_id = $sastra->id ?? null;
            $params->indikator = $indikator['indikator'] ?? null;
            $params->target1 = $indikator['target1'] ?? null;
            $params->target2 = $indikator['target2'] ?? null;
            $params->target3 = $indikator['target3'] ?? null;
            $params->satuan_id = $indikator['satuan_id'] ?? null;
            $params->tipe_perhitungan = $indikator['tipe_perhitungan'] ?? null;
            $params->penjelasan = $indikator['penjelasan'] ?? null;
            $params->sumber_data = $indikator['sumber_data'] ?? null;
            $params->save();
            $savedIds[] = $params->id;
            $savedIdPenjas = [];
            foreach (($indikator['penanggung_jawab'] ?? []) as $penja) {
                if ($penja['id'] ?? false) {
                    $params2 = PemkabPenja::find($penja['id']);
                }else{
                    $params2 = new PemkabPenja();
                }
                $params2->pemkab_sastra_in_id = $params->id;
                $params2->penanggung_jawab = $penja['value'] ?? null;
                $params2->save();
                $savedIdPenjas[] = $params2['id'];
            }
            if (count($savedIdPenjas)) {
                PemkabPenja::where('pemkab_sastra_in_id', $params->id)->whereNotIn('id', $savedIdPenjas)->delete();
            } else {
                PemkabPenja::where('pemkab_sastra_in_id', $params->id)->delete();
            }
            foreach (($indikator['action'] ?? []) as $act) {
                if ($act['id'] ?? false) {
                    $params3 = PemkabSimact::find($act['id']);
                }else{
                    $params3 = new PemkabSimact();
                }
                $params3->pemkab_sastra_in_id = $params->id;
                $params3->action = $act['value'] ?? null;
                $params3->save();
                $savedIdActs[] = $params3['id'];
            }
            if (count($savedIdActs)) {
                PemkabSimact::where('pemkab_sastra_in_id', $params->id)->whereNotIn('id', $savedIdActs)->delete();
            } else {
                PemkabSimact::where('pemkab_sastra_in_id', $params->id)->delete();
            }
        }
        if (count($savedIds)) {
            PemkabSastraIn::where('pemkab_sastra_id', $sastra->id)->whereNotIn('id', $savedIds)->delete();
        } else {
            PemkabSastraIn::where('pemkab_sastra_id', $sastra->id)->delete();
        }
        Alert::toast('Data sasaran program telah diubah', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabSastra $sastra)
    {
        $sastra->delete();
        return redirect()->back();
    }

    public function indicator()
    {
        return view('admin.pemkab.sastra._partials.indicator');
    }

    public function penanggung_jawab(Request $request)
    {
        $params = $request->params;
        return view('admin.pemkab.sastra._partials.penanggung_jawab', compact('params'));
    }

    public function simple_action(Request $request)
    {
        $params = $request->params;
        return view('admin.pemkab.sastra._partials.simple_action', compact('params'));
    }
}
