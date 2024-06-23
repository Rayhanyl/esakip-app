<?php

namespace App\Http\Controllers\Aspu;

use App\Models\PerdaSastra;
use Illuminate\Support\Str;
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
    public function index(Request $request)
    {
        $id = $request->id ?? '';
        $data_pemkab = PemkabSastra::with([
            'pemkab_sastra_ins',
            'perda_sastras',
            'perda_sastras.perda_sastra_ins',
            'perda_sastras.perda_progs',
            'perda_sastras.perda_progs.perda_prog_ins',
            'perda_sastras.perda_progs.perda_kegias',
            'perda_sastras.perda_progs.perda_kegias.perda_kegia_ins',
            'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias',
            'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias.perda_subkegia_ins'
        ])->whereId($id)->get();
        $data_chart = [];
        foreach ($data_pemkab as $data) {
            $indicators_pemkab = '<ul>';
            foreach ($data->pemkab_sastra_ins as $ins) {
                $indicators_pemkab .= '<li>'.$ins->indikator.'</li>';
            }
            $indicators_pemkab .= '</ul>';
            $uid_pemkab = Str::random(4);
            $subdata['id'] = $uid_pemkab;
            $subdata['x'] = '<b>'.$data->sasaran.'<br/><br/>'.$indicators_pemkab.'<br/><br/>Pengampu : Bupati</b>';
            $subdata['color'] = '#a9d08e';
            $data_chart[] = $subdata;
            foreach ($data->perda_sastras as $key => $item) {
                $indicators = '<ul>';
                $targets = '<ul>';
                foreach ($item->perda_sastra_ins as $ins) {
                    $indicators .= '<li>'.$ins->indikator.'</li>';
                    $targets .= '<li>'.$ins->target1.'</li>';
                }
                $indicators .= '</ul>';
                $targets .= '</ul>';
                $uid = Str::random(4);
                $subdata['id'] = $uid;
                $subdata['x'] = '<b>'.$item->sasaran.'<br/><br/>'.$indicators.'<br/><br/>'.$targets.'</b>';
                $subdata['color'] = '#ffff00';
                $subdata['parent'] = $uid_pemkab;
                $data_chart[] = $subdata;
                foreach ($item->perda_progs as $key2 => $item2) {
                    $indicators2 = '<ul>';
                    foreach ($item2->perda_prog_ins as $ins2) {
                        $indicators2 .= '<li>'.$ins2->indikator.'</li>';
                    }
                    $indicators2 .= '</ul>';
                    $uid2 = Str::random(4);
                    $subdata['id'] = $uid2;
                    $subdata['x'] = '<b>'.$item2->sasaran.'<br/><br/>'.$indicators2.'</b>';
                    $subdata['color'] = '#0070c0';
                    $subdata['parent'] = $uid;
                    $data_chart[] = $subdata;
                    foreach ($item2->perda_kegias as $key3 => $item3) {
                        $indicators3 = '<ul>';
                        foreach ($item3->perda_kegia_ins as $ins3) {
                            $indicators3 .= '<li>'.$ins3->indikator.'</li>';
                        }
                        $indicators3 .= '</ul>';
                        $uid3 = Str::random(4);
                        $subdata['id'] = $uid3;
                        $subdata['x'] = '<b>'.$item3->sasaran.'<br/><br/>'.$indicators3.'</b>';
                        $subdata['color'] = '#00b0f0';
                        $subdata['parent'] = $uid2;
                        $data_chart[] = $subdata;
                        foreach ($item3->perda_sub_kegias as $key4 => $item4) {
                            $indicators4 = '<ul>';
                            foreach ($item4->perda_subkegia_ins as $ins4) {
                                $indicators4 .= '<li>'.$ins4->indikator.'</li>';
                            }
                            $indicators4 .= '</ul>';
                            $uid4 = Str::random(4);
                            $subdata['id'] = $uid4;
                            $subdata['x'] = '<b>'.$item4->sasaran.'<br/><br/>'.$indicators4.'</b>';
                            $subdata['parent'] = $uid3;
                            $subdata['color'] = '#aeaaaa';
                            $data_chart[] = $subdata;
                        }
                    }
                }
            }
        }
        $sastra_options = PemkabSastra::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('aspu.perencanaan.cascading.index', compact('data_chart', 'sastra_options', 'id'));
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
