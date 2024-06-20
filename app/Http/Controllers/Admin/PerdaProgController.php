<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaProg;
use App\Models\PerdaProgIn;
use App\Models\PerdaSastra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaProgController extends AdminBaseController
{
    public $baseUrl;
    public $clientId;
    public $clientSecret;

    public function __construct()
    {
        parent::__construct();
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';
        $this->clientId = '3c15eda4-f16a-444a-9807-f03ac2d73ea6';
        $this->clientSecret = 'a36KxQjb6KQO89o6zgb2ld9fC9LwPZ3Tir5chWGC';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerdaProg::whereUserId(Auth::user()->id)->get();
        return view('admin.perda.perencanaan.program.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sastra_options = PerdaSastra::whereUserId(Auth::user()->id)->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('admin.perda.perencanaan.program.create', compact('sastra_options'));
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
        $sastra_options = PerdaSastra::whereUserId(Auth::user()->id)->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        $data = $this->getPengampuNip($saspro->pengampu_id);
        $old_pengampu['id'] = $data->nip;
        $old_pengampu['name'] = $data->nama_pegawai_gelar;
        $saspro->load('perda_prog_ins');
        return view('admin.perda.perencanaan.program.edit', compact('saspro', 'old_pengampu', 'sastra_options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaProg $saspro)
    {
        if($request->pengampu_id == ''){
            $request->merge(['pengampu_id' => $request->old_pengampu_id]);
        }
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

    public function getPengampuNip($nip){
        $response1 = Http::withHeaders([
            'Content-Type' => 'application/json',
            'User-Agent' => 'insomnia/2023.5.8'
        ])->post("{$this->baseUrl}/auth", [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ]);
        $token = json_decode($response1->getBody()->getContents());
        $response2 = Http::withHeaders([
            'User-Agent' => 'insomnia/2023.5.8',
            'Authorization' => 'Bearer ' . $token->result->token
        ])->get('https://sammara.majalengkakab.go.id/public_api/esakip/list_pengampu/' . $nip);
        $detail = json_decode($response2->getBody()->getContents());
        $result = $detail->result;
        return $result;
    }
}
