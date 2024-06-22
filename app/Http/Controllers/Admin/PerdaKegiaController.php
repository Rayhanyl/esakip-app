<?php

namespace App\Http\Controllers\Admin;

use App\Models\PerdaProg;
use App\Models\PerdaKegia;
use App\Models\PerdaKegiaIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\AdminBaseController;

class PerdaKegiaController extends AdminBaseController
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
        $data = PerdaKegia::whereUserId(Auth::user()->id)->get();
        return view('admin.perda.perencanaan.kegiatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $saspro_options = PerdaProg::whereUserId(Auth::user()->id)->get()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('admin.perda.perencanaan.kegiatan.create', compact('saspro_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = PerdaKegia::create(array_merge($request->only(PerdaKegia::FILLABLE_FIELDS), ['user_id' => Auth::user()->id]));
            foreach ($request->indikator as $value) {
                $params = array_merge($value, ['user_id' => Auth::user()->id], ['perda_kegia_id' => $data->id]);
                PerdaKegiaIn::create($params);
            }
            Alert::toast('Berhasil menambahkan data', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            Alert::toast('Gagal menambahkan data', 'danger');
            return redirect()->back();
        }

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
        $data = $this->getPengampuNip($saske->pengampu_id);
        $old_pengampu['id'] = $data->nip;
        $old_pengampu['name'] = $data->nama_pegawai_gelar;
        $saske->load('perda_kegia_ins');
        $saspro_options = PerdaProg::whereUserId(Auth::user()->id)->get()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('admin.perda.perencanaan.kegiatan.edit', compact('saske', 'saspro_options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerdaKegia $saske)
    {
        if($request->pengampu_id == ''){
            $request->merge(['pengampu_id' => $request->old_pengampu_id]);
        }
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
