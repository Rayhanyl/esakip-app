<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SasaranStrategis;
use App\Models\SasaranSubKegiatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\PerdaPengukuranKinerja;
use App\Http\Requests\StorePerdaPengukuranKinerjaRequest;
use App\Http\Requests\UpdatePerdaPengukuranKinerjaRequest;

class PerdaPengukuranKinerjaController extends Controller
{
    public function __construct()
    {
        View::share('sasaran_strategis_options', SasaranStrategis::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_strategis;
        }));
        View::share('sasaran_sub_kegiatan_options', SasaranSubKegiatan::all()->keyBy('id')->transform(function ($item) {
            return $item->sasaran_sub_kegiatan;
        }));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.perda.pengukuran_kinerja.index');
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
        dd($request->all());
        PerdaPengukuranKinerja::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerdaPengukuranKinerjaRequest $request, PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerdaPengukuranKinerja $perdaPengukuranKinerja)
    {
        //
    }
}
