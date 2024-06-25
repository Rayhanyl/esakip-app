<?php

namespace App\Http\Controllers\Aspu;

use App\Models\User;
use App\Models\PerdaSastra;
use Illuminate\Support\Str;
use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PohonKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_options = User::whereRole('perda')->get()->keyBy('id')->transform(function ($list) {
            return $list->name;
        });
        return view('aspu.perencanaan.pohon-kinerja.index', compact( 'user_options'));
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

    function get_chart(Request $request)
    {
        $id = $request->id ?? '';
        $data_pemkab = PemkabSastra::with([
            'pemkab_sastra_ins',
            'perda_sastras' => function($query) use ($id) {
                $query->where('id', $id);
            },
            'perda_sastras.perda_sastra_ins',
            'perda_sastras.perda_progs',
            'perda_sastras.perda_progs.perda_prog_ins',
            'perda_sastras.perda_progs.perda_kegias',
            'perda_sastras.perda_progs.perda_kegias.perda_kegia_ins',
            'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias',
            'perda_sastras.perda_progs.perda_kegias.perda_sub_kegias.perda_subkegia_ins'
        ])->whereHas('perda_sastras', function($query) use ($id) {
            $query->where('id', $id);
        })->get();
        $data_chart = [];
        foreach ($data_pemkab as $data) {
            $uid_pemkab = Str::random(4);
            $subdata['id'] = $uid_pemkab;
            $sasaran_strategis = '<span style="font-size: 18px; font-weight: bold">'.$data->sasaran.'</span><br/>';
            $indicators_pemkab = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
            foreach ($data->pemkab_sastra_ins as $ins) {
                $indicators_pemkab .= '<span style="font-size: 16px; font-weight: bold">- '.$ins->indikator.'</span><br/>';;
            }
            $indicators_pemkab .= '<br/>';
            $subdata['x'] = $sasaran_strategis.$indicators_pemkab;
            $subdata['color'] = '#a9d08e';
            $subdata['label'] = [
                'style' => [
                    'color' => 'black',
                ],
            ];
            $data_chart[] = $subdata;
            foreach ($data->perda_sastras as $item) {
                $uid = Str::random(4);
                $subdata['id'] = $uid;
                $sasaran_strategis = '<span style="font-size: 16px">Sasaran Strategis : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item->sasaran.'</span><br/>';
                $indicators = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                foreach ($item->perda_sastra_ins as $ins) {
                    $indicators .= '<span style="font-size: 16px; font-weight: bold">- '.$ins->indikator.'</span><br/>';;
                }
                $indicators .= '<br/>';
                $subdata['x'] = $sasaran_strategis.$indicators;
                $subdata['color'] = '#ffff00';
                $subdata['parent'] = $uid_pemkab;
                $data_chart[] = $subdata;
                foreach ($item->perda_progs as $item2) {
                    $uid2 = Str::random(4);
                    $subdata['id'] = $uid2;
                    $sasaran2 = '<span style="font-size: 16px">Sasaran Program : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item2->sasaran.'</span><br/>';
                    $indicators2 = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                    foreach ($item2->perda_prog_ins as $ins2) {
                        $indicators2 .= '<span style="font-size: 16px; font-weight: bold">- '.$ins2->indikator.'</span><br/>';;
                    }
                    $indicators2 .= '<br/>';
                    $subdata['x'] = $sasaran2.$indicators2;
                    $subdata['color'] = '#0070c0';
                    $subdata['parent'] = $uid;
                    $subdata['label'] = [
                        'style' => [
                            'color' => 'white',
                        ],
                    ];
                    $data_chart[] = $subdata;
                    foreach ($item2->perda_kegias as $item3) {
                        $uid3 = Str::random(4);
                        $subdata['id'] = $uid3;
                        $sasaran3 = '<span style="font-size: 16px">Sasaran Kegiatan : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item3->sasaran.'</span><br/>';
                        $indicators3 = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                        foreach ($item3->perda_kegia_ins as $ins3) {
                            $indicators3 .= '<span style="font-size: 16px; font-weight: bold">- '.$ins3->indikator.'</span><br/>';;
                        }
                        $indicators3 .= '<br/>';
                        $subdata['x'] = $sasaran3.$indicators3;
                        $subdata['color'] = '#00b0f0';
                        $subdata['parent'] = $uid2;
                        $subdata['label'] = [
                            'style' => [
                                'color' => 'black',
                            ],
                        ];
                        $data_chart[] = $subdata;
                        foreach ($item3->perda_sub_kegias as $key4 => $item4) {
                            $uid4 = Str::random(4);
                            $subdata['id'] = $uid4;
                            $sasaran4 = '<span style="font-size: 16px">Sasaran Sub Kegiatan : </span><br/><span style="font-size: 18px; font-weight: bold">'.$item4->sasaran.'</span><br/>';
                            $indicators4 = '<br/><br/><span style="font-size: 14px">Indikator : </span><br/>';
                            foreach ($item4->perda_subkegia_ins as $ins4) {
                                $indicators4 .= '<span style="font-size: 16px; font-weight: bold">- '.$ins4->indikator.'</span><br/>';;
                            }
                            $indicators4 .= '<br/>';
                            $subdata['x'] = $sasaran4.$indicators4;
                            $subdata['parent'] = $uid3;
                            $subdata['color'] = '#aeaaaa';
                            $subdata['label'] = [
                                'style' => [
                                    'color' => 'black',
                                ],
                            ];
                            $data_chart[] = $subdata;
                        }
                    }
                }
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
