<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SasaranBupati;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\SasaranBupatiIndikator;
use App\Models\PemkabPengukuranKinerja;
use App\Http\Requests\StorePemkabPengukuranKinerjaRequest;
use App\Http\Requests\UpdatePemkabPengukuranKinerjaRequest;

class PemkabPengukuranKinerjaController extends Controller
{
    public function __construct()
    {
        View::share('sasaran_bupati_options', SasaranBupati::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_bupati;
        }));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemkab.pengukuran_kinerja.index');
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
        PemkabPengukuranKinerja::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemkabPengukuranKinerjaRequest $request, PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemkabPengukuranKinerja $pemkabPengukuranKinerja)
    {
        //
    }

    public function indicator()
    {
    }

    public function get_indicator(Request $request)
    {
        $indicators = SasaranBupatiIndikator::whereSasaranBupatiId($request->id)->get();
        return response()->json($indicators);
    }

    public function get_target(Request $request)
    {
        $targets = SasaranBupatiIndikator::whereId($request->id)->get();
        return response()->json($targets);
    }
}
