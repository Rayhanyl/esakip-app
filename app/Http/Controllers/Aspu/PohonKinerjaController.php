<?php

namespace App\Http\Controllers\Aspu;

use App\Models\PerdaSastra;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PohonKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->id ?? '';
        $data = PerdaSastra::with([
            'perda_sastra_ins',
            'perda_progs',
            'perda_progs.perda_prog_ins',
            'perda_progs.perda_kegias',
            'perda_progs.perda_kegias.perda_kegia_ins',
            'perda_progs.perda_kegias.perda_sub_kegias',
            'perda_progs.perda_kegias.perda_sub_kegias.perda_subkegia_ins'
        ])->whereId($id)->get();
        $data_chart = [];
        foreach ($data as $key => $item) {
            $indicators = '<ul>';
            foreach ($item->perda_sastra_ins as $ins) {
                $indicators .= '<li>'.$ins->indikator.'</li>';
            }
            $indicators .= '</ul>';
            $uid = Str::random(4);
            $subdata['id'] = $uid;
            $subdata['x'] = $item->sasaran.'<br/><br/>'.$indicators;
            $subdata['color'] = '#00b050';
            $subdata['label'] = [
                'style' => [
                    'color' => 'black',
                    'align' => 'left',
                    'fontWeight' => 'bolder',
                ],
            ];
            $data_chart[] = $subdata;
            foreach ($item->perda_progs as $key2 => $item2) {
                $indicators2 = '<ul>';
                foreach ($item2->perda_prog_ins as $ins2) {
                    $indicators2 .= '<li>'.$ins2->indikator.'</li>';
                }
                $indicators2 .= '</ul>';
                $uid2 = Str::random(4);
                $subdata['id'] = $uid2;
                $subdata['x'] = $item2->sasaran.'<br/><br/>'.$indicators2;
                $subdata['color'] = '#ffff00';
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
                    $subdata['color'] = '#0070c0';
                    $subdata['label'] = [
                        'style' => [
                            'color' => 'white',
                            'align' => 'left',
                        ],
                    ];
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
                        $subdata['color'] = '#d9d9d9';
                        $subdata['label'] = [
                            'style' => [
                                'color' => 'black',
                                'align' => 'left',
                            ],
                        ];
                        $data_chart[] = $subdata;
                    }
                }
            }
        }
        $sastra_options = PerdaSastra::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('aspu.perencanaan.pohon-kinerja.index', compact('data_chart', 'sastra_options', 'id'));
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
