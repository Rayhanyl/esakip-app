<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaProg;
use App\Models\PerdaProgIn;
use App\Models\PerdaSastra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaProgController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('sastra_options', PerdaSastra::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        }));
        View::share('perdaProgData', PerdaProg::all());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perda.perencanaan.program.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perda.perencanaan.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = PerdaProg::create(array_merge($request->only(PerdaProg::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
        foreach ($request->indikator as $value) {
            $params = array_merge($value, ['user_id' => Auth::user()->id], ['perda_prog_id' => $data->id]);
            PerdaProgIn::create($params);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaProg $perdaProg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaProg $saspro)
    {
        $saspro->load('perda_prog_ins');
        return view('admin.perda.perencanaan.program.edit', compact('saspro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaProg $saspro)
    {
        $saspro->update($request->only(PerdaProg::FILLABLE_FIELDS));
        $savedIds = [];
        foreach (($request->indikator ?? []) as $indikator) {
            if ($indikator['id'] ?? false) {
                $params = PerdaProgIn::find($indikator['id']);
            } else {
                $params = new PerdaProgIn();
            }
            $params->user_id = Auth::user()->id ?? null;
            $params->perda_prog_id = $saspro->id ?? null;
            $params->indikator = $indikator['indikator'] ?? null;
            $params->target = $indikator['target'] ?? null;
            $params->satuan_id = $indikator['satuan_id'] ?? null;
            $params->program = $indikator['program'] ?? null;
            $params->anggaran = $indikator['anggaran'] ?? null;
            $params->save();
            $savedIds[] = $params->id;
        }
        if (count($savedIds)) {
            PerdaProgIn::where('perda_prog_id', $saspro->id)->whereNotIn('id', $savedIds)->delete();
        } else {
            PerdaProgIn::where('perda_prog_id', $saspro->id)->delete();
        }
        Alert::toast('Data sasaran program telah diubah', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaProg $saspro)
    {
        $saspro->delete();
        return redirect()->back();
    }
    public function indicator()
    {
        return view('admin.perda.perencanaan.program._partials.indicator');
    }
}
