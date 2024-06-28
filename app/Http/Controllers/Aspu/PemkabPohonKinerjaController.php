<?php

namespace App\Http\Controllers\Aspu;

use App\Models\User;
use App\Models\PerdaSastra;
use Illuminate\Support\Str;
use App\Models\PemkabSastra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemkabPohonKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $sastra_options = PemkabSastra::all()->keyBy('id')->transform(function ($sasaran) {
            return $sasaran->sasaran;
        });
        return view('aspu.perencanaan.pemkab.pohon-kinerja.index', compact( 'sastra_options'));
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
            }
        }
        return response()->json($data_chart);
    }
    function get_sasaran(Request $request)
    {
        $sastra_options = PemkabSastra::whereUserId($request->user_id)->get();
        return response()->json($sastra_options);
    }
}
