<?php

namespace App\Http\Controllers\Aspu;

use App\Models\User;
use App\Models\PerdaSastra;
use Illuminate\Support\Str;
use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PemkabCascadingController extends Controller
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
        $sastra_options = PemkabSastra::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('aspu.perencanaan.pemkab.cascading.index', compact('sastra_options'));
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
        $result = $detail->result ?? '';
        $pengampu = '';
        if ($result->jabatan_struktural != '') {
            $pengampu = $result->jabatan_struktural;
        }elseif ($result->jabatan_pelaksana != ''){
            $pengampu = $result->jabatan_pelaksana;
        }elseif ($result->jabatan_fungsional != ''){
            $pengampu = $result->jabatan_fungsional;
        }
        return $pengampu;
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

    function to_rp(int $value)
    {
        $nominal = number_format($value, 0, '', '.');
        $ret = 'Rp ' . $nominal;
        return $ret;
    }

    function get_chart(Request $request)
    {
        $id = $request->id;
        $data_pemkab = PemkabSastra::with([
            'pemkab_sastra_ins',
            'perda_sastras',
            'perda_sastras.perda_sastra_ins',
            'perda_sastras.perda_sastra_ins.satuan',
        ])->whereId($id)->get();
        $data_chart = [];
        foreach ($data_pemkab as $data) {
            $uid_pemkab = Str::random(4);
            $subdata['id'] = $uid_pemkab;
            $indicators_pemkab = '';
            foreach ($data->pemkab_sastra_ins as $ins) {
                $indicators_pemkab .= '<span style="font-size: 18px"> - '.$ins->indikator.'</span>';
            }
            $indicators_pemkab .= '<br/>';
            $subdata['x'] = '<span style="font-size: 16px; font-weight: bold">'.$data->sasaran.'</span><br/><br/><span style="font-size: 16px; font-weight: bold">Indikator : </span><br/>'.$indicators_pemkab.'<br/><span style="font-size: 16px; font-weight: bold">Pengampu : </span><br/><span style="font-size: 14px; color: #555555">Bupati</span>';
            $subdata['color'] = '#a9d08e';
            $subdata['parent'] = '';
            $subdata['label'] = [
                'style' => [
                    'color' => 'black',
                    'align' => 'left',
                    'minHeight' => '300px',
                ],
            ];
            $data_chart[] = $subdata;
            foreach ($data->perda_sastras as $item) {
                $uid = Str::random(4);
                $subdata['id'] = $uid;
                $sasaran_strategis = '<span style="font-size: 16px">Sasaran Strategis : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item->sasaran.'</span><br/>';
                $pengampu = $this->getPengampuNip($item->pengampu_id);
                $pengampus = '<br/><span style="font-size: 14px">Pengampu : </span><br/><span style="font-size: 16px; font-weight: bold">' . $pengampu.'</span>';
                $indicators = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                foreach ($item->perda_sastra_ins as $ins) {
                    $indicators .= '<span style="font-size: 16px; font-weight: bold">- '.$ins->indikator.'</span><br/>';
                    $indicators .= '<span style="font-size: 16px;">Target : '.$ins->target1.' '.$ins->satuan->satuan.'</span><br/><br/>';
                }
                $indicators .= '<br/>';
                $subdata['x'] = $sasaran_strategis.$indicators.$pengampus;
                $subdata['color'] = '#ffff00';
                $subdata['parent'] = $uid_pemkab;
                $data_chart[] = $subdata;
            }
        }
        return response()->json($data_chart);
    }
    function get_sasaran(Request $request)
    {
        $sastra_options = PerdaSastra::whereUserId($request->user_id)->get();
        return response()->json($sastra_options);
    }
}
