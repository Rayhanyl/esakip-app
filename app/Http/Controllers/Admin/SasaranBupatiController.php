<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SasaranBupati;
use App\Http\Requests\StoreSasaranBupatiRequest;
use App\Http\Requests\UpdateSasaranBupatiRequest;

class SasaranBupatiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemkab.perencanaan_kinerja.sasaran_bupati.index');
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
    public function store(StoreSasaranBupatiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSasaranBupatiRequest $request, SasaranBupati $sasaranBupati)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranBupati $sasaranBupati)
    {
        //
    }
}
