<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaKegia;
use Illuminate\Http\Request;
use App\Models\PerdaSubKegia;
use App\Models\PerdaSubKegiaIn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use App\Models\PerdaSubKegiaPengampu;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaSubKegiaController extends AdminBaseController
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
        $data = PerdaSubKegia::whereUserId( Auth::user()->id)->get();
        return view('admin.perda.perencanaan.subkegiatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegia_options = PerdaKegia::whereUserId(Auth::user()->id)->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('admin.perda.perencanaan.subkegiatan.create', compact('kegia_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = PerdaSubKegia::create(array_merge($request->only(PerdaSubKegia::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
            foreach (($request->pengampu ?? []) as $pengampu) {
                $param_pengampus = array_merge(['perda_subkegia_id' => $data->id], ['pengampu_id' => $pengampu['value']]);
                PerdaSubKegiaPengampu::create($param_pengampus);
            }
            foreach ($request->indikator as $value) {
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['perda_subkegia_id' => $data->id]);
                PerdaSubKegiaIn::create($params);
            }
            Alert::toats('Berhasil menambahkan data', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::toats('Gagal menambahkan data', 'danger');
            return redirect()->back();
        }
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
        $kegia_options = PerdaKegia::whereUserId(Auth::user()->id)->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        $sasubkegium->load('perda_subkegia_ins', 'perda_subkegia_pengampus');
        foreach ($sasubkegium->perda_subkegia_pengampus as $key => $value) {
            $data = $this->getPengampuNip($value->pengampu_id);
            $value->old_pengampu_id = $data->nip;
            $value->old_pengampu_name = $data->nama_pegawai_gelar;
        }
        return view('admin.perda.perencanaan.subkegiatan.edit', compact('sasubkegium', 'kegia_options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaSubKegia $sasubkegium)
    {
        if($request->pengampu_id == ''){
            $request->merge(['pengampu_id' => $request->old_pengampu_id]);
        }
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
