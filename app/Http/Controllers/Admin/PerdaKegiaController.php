<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaProg;
use App\Models\PerdaKegia;
use App\Models\PerdaKegiaIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaKegiaController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('saspro_options', PerdaProg::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        }));
        View::share('perdaKegiaData', PerdaKegia::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerdaKegia::where('id', Auth::user()->id)->get();
        return view('admin.perda.perencanaan.kegiatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perda.perencanaan.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = PerdaKegia::create(array_merge($request->only(PerdaKegia::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
        foreach ($request->indikator as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['perda_kegia_id' => $data->id]);
            PerdaKegiaIn::create($params);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaKegia $perdaKegia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaKegia $saske)
    {
        $saske->load('perda_kegia_ins');
        return view('admin.perda.perencanaan.kegiatan.edit', compact('saske'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaKegia $saske)
    {
        $saske->update($request->only(PerdaKegia::FILLABLE_FIELDS));
        $savedIds = [];
        foreach (($request->indikator ?? []) as $indikator) {
            if ($indikator['id'] ?? false) {
                $params = PerdaKegiaIn::find($indikator['id']);
            } else {
                $params = new PerdaKegiaIn();
            }
            $params->user_id = Auth::user()->id ?? null;
            $params->perda_kegia_id = $saske->id ?? null;
            $params->indikator = $indikator['indikator'] ?? null;
            $params->target = $indikator['target'] ?? null;
            $params->satuan_id = $indikator['satuan_id'] ?? null;
            $params->kegiatan = $indikator['kegiatan'] ?? null;
            $params->anggaran = $indikator['anggaran'] ?? null;
            $params->save();
            $savedIds[] = $params->id;
        }
        if (count($savedIds)) {
            PerdaKegiaIn::where('perda_kegia_id', $saske->id)->whereNotIn('id', $savedIds)->delete();
        } else {
            PerdaKegiaIn::where('perda_kegia_id', $saske->id)->delete();
        }
        Alert::toast('Data sasaran kegiatan telah diubah', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaKegia $saske)
    {
        $saske->delete();
        return redirect()->back();
    }
    public function indicator()
    {
        return view('admin.perda.perencanaan.kegiatan._partials.indicator');
    }
}
