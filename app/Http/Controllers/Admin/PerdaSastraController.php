<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaSastra;
use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use App\Models\PerdaSastraPenja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSastraController extends AdminBaseController
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
        View::share('sasaran_bupati_options', PemkabSastra::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        }));
        View::share('perdaSastraData', PerdaSastra::all());
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerdaSastra::whereUserId(Auth::user()->id)->get();
        return view('admin.perda.perencanaan.sastra.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perda.perencanaan.sastra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = PerdaSastra::create(array_merge($request->only(PerdaSastra::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
            foreach ($request->indikator as $value) {
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['perda_sastra_id' => $data->id]);
                $data2 = PerdaSastraIn::create($params);
                foreach ($value['penanggung_jawab'] as $value2) {
                    $params2 = ['perda_sastra_in_id' => $data2->id, 'penanggung_jawab' => $value2['value']];
                    PerdaSastraPenja::create($params2);
                }
            }
            Alert::toast('Berhasil mengisi data', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::toast('Gagal mengisi data', 'danger');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaSastra $perdaSastra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaSastra $sastra)
    {
        $data = $this->getPengampuNip($sastra->pengampu_id);
        $old_pengampu['id'] = $data->nip;
        $old_pengampu['name'] = $data->nama_pegawai_gelar;
        $sastra->load('perda_sastra_ins', 'perda_sastra_ins.penanggung_jawabs');
        return view('admin.perda.perencanaan.sastra.edit', compact('sastra', 'old_pengampu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaSastra $sastra)
    {
        if($request->pengampu_id == ''){
            $request->merge(['pengampu_id' => $request->old_pengampu_id]);
        }
        $sastra->update($request->only(PerdaSastra::FILLABLE_FIELDS));
        $savedIds = [];
        foreach (($request->indikator ?? []) as $indikator) {
            if ($indikator['id'] ?? false) {
                $params = PerdaSastraIn::find($indikator['id']);
            } else {
                $params = new PerdaSastraIn();
            }
            $params->user_id = Auth::user()->id ?? null;
            $params->perda_sastra_id = $sastra->id ?? null;
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
                    $params2 = PerdaSastraPenja::find($penja['id']);
                }else{
                    $params2 = new PerdaSastraPenja();
                }
                $params2->perda_sastra_in_id = $params->id;
                $params2->penanggung_jawab = $penja['value'] ?? null;
                $params2->save();
                $savedIdPenjas[] = $params2['id'];
            }
            if (count($savedIdPenjas)) {
                PerdaSastraPenja::where('perda_sastra_in_id', $params->id)->whereNotIn('id', $savedIdPenjas)->delete();
            } else {
                PerdaSastraPenja::where('perda_sastra_in_id', $params->id)->delete();
            }
        }
        if (count($savedIds)) {
            PerdaSastraIn::where('perda_sastra_id', $sastra->id)->whereNotIn('id', $savedIds)->delete();
        } else {
            PerdaSastraIn::where('perda_sastra_id', $sastra->id)->delete();
        }
        Alert::toast('Data sasaran strategis telah diubah', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaSastra $sastra)
    {
        $sastra->delete();
        return redirect()->back();
    }

    public function indicator()
    {
        return view('admin.perda.perencanaan.sastra._partials.indicator');
    }

    public function penanggung_jawab(Request $request)
    {
        $params = $request->params;
        return view('admin.perda.perencanaan.sastra._partials.penanggung_jawab', compact('params'));
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
