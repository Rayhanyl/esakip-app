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
        return view('aspu.perencanaan.pemkab.cascading.index');
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

    function to_rp(int $value)
    {
        $nominal = number_format($value, 0, '', '.');
        $ret = 'Rp ' . $nominal;
        return $ret;
    }

    function get_chart()
    {
        $data_pemkab = PemkabSastra::with([
            'pemkab_sastra_ins',
            'perda_sastras',
            'perda_sastras.perda_sastra_ins',
            'perda_sastras.perda_sastra_ins.satuan',
            // 'perda_sastras.perda_progs',
            // 'perda_sastras.perda_progs.perda_prog_ins',
            // 'perda_sastras.perda_progs.perda_prog_ins.satuan',
            // 'perda_sastras.perda_progs.perda_kegias',
            // 'perda_sastras.perda_progs.perda_kegias.perda_kegia_ins',
            // 'perda_sastras.perda_progs.perda_kegias.perda_kegia_ins.satuan',
            // 'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias',
            // 'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias.perda_subkegia_ins',
            // 'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias.perda_subkegia_ins.satuan'
        ])->get();
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
                $pengampus = '<br/><span style="font-size: 14px">Pengampu : </span><br/><span style="font-size: 16px; font-weight: bold">' . $pengampu->opd.'</span>';
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
                // foreach ($item->perda_progs as $key2 => $item2) {
                //     $uid2 = Str::random(4);
                //     $subdata['id'] = $uid2;
                //     $sasaran2 = '<span style="font-size: 16px">Sasaran Program : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item2->sasaran.'</span><br/>';
                //     $pengampu2 = $this->getPengampuNip($item2->pengampu_id);
                //     $pengampus2 = '<br/><span style="font-size: 14px">Pengampu : </span><br/><span style="font-size: 16px; font-weight: bold">' . $pengampu2->opd.'</span>';
                //     $indicators2 = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                //     foreach ($item2->perda_prog_ins as $ins2) {
                //         $indicators2 .= '<span style="font-size: 16px; font-weight: bold">- '.$ins2->indikator.'</span><br/>';
                //         $indicators2 .= '<span style="font-size: 16px;">Target : '.$ins2->target.' '.$ins2->satuan->satuan.'</span><br/>';
                //         $indicators2 .= '<span style="font-size: 16px;">Program : '.$ins2->program.'</span><br/>';
                //         $indicators2 .= '<span style="font-size: 16px;">Anggaran : '.$ins2->anggaran.'</span><br/>';
                //     }
                //     $indicators2 .= '<br/>';
                //     $subdata['x'] = $sasaran2.$indicators2.$pengampus2;
                //     $subdata['color'] = '#0070c0';
                //     $subdata['parent'] = $uid;
                //     $subdata['label'] = [
                //         'style' => [
                //             'color' => 'white',
                //         ],
                //     ];
                //     $data_chart[] = $subdata;
                //     foreach ($item2->perda_kegias as $key3 => $item3) {
                //         $uid3 = Str::random(4);
                //         $subdata['id'] = $uid3;
                //         $sasaran3 = '<span style="font-size: 16px">Sasaran Kegiatan : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item3->sasaran.'</span><br/>';
                //         $pengampu3 = $this->getPengampuNip($item3->pengampu_id);
                //         $pengampus3 = '<br/><span style="font-size: 14px">Pengampu : </span><br/><span style="font-size: 16px; font-weight: bold">' . $pengampu3->opd.'</span>';
                //         $indicators3 = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                //         foreach ($item3->perda_kegia_ins as $ins3) {
                //             $indicators3 .= '<span style="font-size: 16px; font-weight: bold">- '.$ins3->indikator.'</span><br/>';
                //             $indicators3 .= '<span style="font-size: 16px;">Target : '.$ins3->target.' '.$ins3->satuan->satuan.'</span><br/>';
                //             $indicators3 .= '<span style="font-size: 16px;">Kegiatan : '.$ins3->kegiatan.'</span><br/>';
                //             $indicators3 .= '<span style="font-size: 16px;">Anggaran : '.$ins3->anggaran.'</span><br/>';
                //         }
                //         $indicators3 .= '<br/>';
                //         $subdata['x'] = $sasaran3.$indicators3.$pengampus3;
                //         $subdata['color'] = '#00b0f0';
                //         $subdata['parent'] = $uid2;
                //         $subdata['label'] = [
                //             'style' => [
                //                 'color' => 'black',
                //             ],
                //         ];
                //         $data_chart[] = $subdata;
                //         foreach ($item3->perda_sub_kegias as $key4 => $item4) {
                //             $uid4 = Str::random(4);
                //             $subdata['id'] = $uid4;
                //             $sasaran4 = '<span style="font-size: 16px">Sasaran Sub Kegiatan : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item4->sasaran.'</span><br/>';
                //             $pengampus4 = '<br/><span style="font-size: 14px">Pengampu : </span><br/>';
                //             foreach ($item4->perda_subkegia_pengampus as $sk_pengampu) {
                //                 $pengampu4 = $this->getPengampuNip($sk_pengampu->pengampu_id);
                //                 $pengampus4 .= '- <span style="font-size: 16px; font-weight: bold">'.$pengampu4->opd.'</span><br/>';
                //             }
                //             $pengampus4 .= '<br/>';
                //             $indicators4 = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                //             foreach ($item4->perda_subkegia_ins as $ins4) {
                //                 $indicators4 .= '<span style="font-size: 16px; font-weight: bold">- '.$ins4->indikator.'</span><br/>';
                //                 $indicators4 .= '<span style="font-size: 16px;">Target : '.$ins4->target.' '.$ins4->satuan->satuan.'</span><br/>';
                //                 $indicators4 .= '<span style="font-size: 16px;">Pagu : '.$this->to_rp($ins4->anggaran).'</span><br/>';
                //                 $indicators4 .= '<span style="font-size: 16px;">Sub Kegiatan : '.$ins4->subkegiatan.'</span><br/>';
                //                 $indicators4 .= '<span style="font-size: 16px;">Anggaran : '.$ins4->anggaran.'</span><br/>';
                //             }
                //             $indicators4 .= '<br/>';
                //             $subdata['x'] = $sasaran4.$indicators4.$pengampus4;
                //             $subdata['parent'] = $uid3;
                //             $subdata['color'] = '#aeaaaa';
                //             $subdata['label'] = [
                //                 'style' => [
                //                     'color' => 'black',
                //                 ],
                //             ];
                //             $data_chart[] = $subdata;
                //         }
                //     }
                // }
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
