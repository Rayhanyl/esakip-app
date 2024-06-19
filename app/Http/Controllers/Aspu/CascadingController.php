<?php

namespace App\Http\Controllers\Aspu;

use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CascadingController extends Controller
{
    private $baseUrl;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->baseUrl = 'https://sammara.majalengkakab.go.id/public_api';
        $this->clientId = '3c15eda4-f16a-444a-9807-f03ac2d73ea6';
        $this->clientSecret = 'a36KxQjb6KQO89o6zgb2ld9fC9LwPZ3Tir5chWGC';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        ])->get($this->baseUrl . '/esakip/list_pengampu');
        $pengampu = json_decode($response2->getBody()->getContents());
        $data = PemkabSastra::with([
            'user',
            'pemkab_sastra_ins',
            'perda_sastras',
            'perda_sastras.perda_progs.perda_prog_ins',
            'perda_sastras.perda_progs.perda_kegias.perda_kegia_ins',
            'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias',
            'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias.perda_subkegia_ins'
        ])->get();

        foreach ($data as $value) {
            foreach ($value->perda_sastras as $sastra) {
                if ($sastra->pengampu_id == 0) {
                    continue;
                }
                $data_pengampu = $this->getPengampuNip($sastra->pengampu_id);
                $sastra->pengampu = $data_pengampu;
            }
        }
        return view('aspu.perencanaan.cascading.index');
    }

    public function getPengampuNip($nip)
    {
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
